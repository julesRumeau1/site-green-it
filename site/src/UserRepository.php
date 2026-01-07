<?php

final class UserRepository
{
    public function findById(string $userId): ?array
    {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('SELECT userId, userPwd FROM user WHERE userId = :id LIMIT 1');
        $stmt->execute([':id' => $userId]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(string $userId, string $passwordHash): bool
    {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('INSERT INTO user (userId, userPwd) VALUES (:id, :pwd)');
        return $stmt->execute([':id' => $userId, ':pwd' => $passwordHash]);
    }
}
