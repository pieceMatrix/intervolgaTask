<?php
class UserTable
{
    public static function create(
        string $email,
        string $full_name,
        string $birth_date,
        string $gender,
        string $interests,
        int $blood_type,
        string $factor,
        string $vk,
        string $password
    ) {
        $query = Database::prepare(
            "INSERT INTO `user` (`email`, `full_name`, `birth_date`, `gender`, `interests`, `blood_type`, `factor`, `vk`, `password`, `sault`)
                VALUES (:email, :full_name, :birth_date, :gender, :interests, :blood_type, :factor, :vk, :password, :sault)"
        );

        $sault = substr(md5(time()), 0, rand(10, 20));

        $query->bindValue(":email", $email);
        $query->bindValue(":full_name", $full_name);
        $query->bindValue(":birth_date", $birth_date);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":interests", $interests);
        $query->bindValue(":blood_type", $blood_type);
        $query->bindValue(":factor", $factor);
        $query->bindValue(":vk", $vk);
        $query->bindValue(":password", password_hash($password . $sault, PASSWORD_DEFAULT));
        $query->bindValue(":sault", $sault);

        if (!$query->execute()) {
            throw new PDOException('При добавлении пользователя возникла ошибка');
        }
    }

    public static function get_by_email(string $email): array | null
    {
        $query = Database::prepare("SELECT * FROM `user` WHERE `email` = :email");
        $query->bindValue(":email", $email);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return null;
        }

        return $users[0];
    }

    public static function get_by_id(int $id) {
        $query = Database::prepare("SELECT * FROM `user` WHERE `id` = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return null;
        }

        return $users[0];
    }

    public static function is_blocked(string $email) : bool {
        $user = static::get_by_email($email);
        if ($user === null) {
            return false;
        }
        $id = $user['id'];
        Database::query("DELETE FROM `login_attemp` WHERE time < DATE_SUB(NOW(), INTERVAL '1' HOUR)");
        $query = Database::prepare("SELECT user.id as id, user.block_time as block_time, COUNT(login_attemp.id) as count FROM user INNER JOIN login_attemp WHERE user.id = :id GROUP BY user.id ");
        $query->bindParam(":id", $id);
        $query->execute();

        $user = $query->fetchAll();

        if (!count($user)) {
            return false;
        }
        
        if (!empty($user[0]['block_time'])) {
            $time = strtotime($user[0]['block_time']);
            $now = time();
            if (($now - $time) / 1000 * 60 * 60 > 1) {
                $query = Database::prepare("UPDATE `user` SET block_time = NULL WHERE id = :id");
                $query->bindParam(":id", $id);
                $query->execute();
                return false;
            } else {
                return true;
            }
        }

        return false;
    }

    public static function addAttemp(string $email) {
        $user = static::get_by_email($email);
        if ($user === null) {
            return;
        }
        $id = $user['id'];

        Database::prepare("INSERT INTO `login_attemp` (user_id, time) VALUES(:id, now())")->execute([":id" => $id]);

        $query = Database::prepare("SELECT user.id as id, user.block_time as block_time, COUNT(login_attemp.id) as count FROM user INNER JOIN login_attemp WHERE user.id = :id GROUP BY user.id ");
        $query->bindParam(":id", $id);
        $query->execute();

        $user = $query->fetchAll();

        if ($user[0]['count'] >= 3) {
            Database::prepare("UPDATE `user` SET block_time = now() WHERE id = :id")->execute([":id" => $id]);
            Database::prepare("DELETE FROM `login_attemp` WHERE user_id = :id")->execute([':id' => $id]);
        }
    }
}
