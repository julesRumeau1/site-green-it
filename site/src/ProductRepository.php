<?php

final class ProductRepository
{
    public function list(): array
    {
        $pdo = Database::pdo();
        $stmt = $pdo->query('SELECT id, titre, descr, img FROM produits ORDER BY id ASC');
        $rows = $stmt->fetchAll();
        foreach ($rows as &$r) {
            // Normalize expected image names to our  assets.
            $img = pathinfo((string)($r['img'] ?? ''), PATHINFO_FILENAME);
            if ($img !== '') {
                $r['img_basename'] = $img;
            } else {
                $r['img_basename'] = 'img1';
            }
        }
        return $rows;
    }
}
