<?php

final class SupportRepository
{
    public function create(string $nom, string $email, string $sujet, string $message): bool
    {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('INSERT INTO support (suNom, suEmail, suSub, suMsg) VALUES (:nom, :email, :sub, :msg)');
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':sub' => $sujet,
            ':msg' => $message,
        ]);
    }
}
