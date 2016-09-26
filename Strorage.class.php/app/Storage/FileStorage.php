<?php

namespace App\Storage;

use App\Storage\Contracts\StorageInterface;

class FileStorage implements StorageInterface
{
    protected $storageKey = 'items';

    public function __construct($storageKey = null)
    {
        if ($storageKey) {
            $this->storageKey = $storageKey;
        }

        if (!file_exists("storage/{$this->storageKey}")) {
            mkdir("storage/{$this->storageKey}");
        }
    }

    public function set($key, $value)
    {
        file_put_contents("storage/{$this->storageKey}/{$key}", $value);
    }

    public function get($key)
    {
        if ($this->keyExists($key)) {
            return file_get_contents("storage/{$this->storageKey}/{$key}");
        }
    }

    public function delete($key)
    {
        if (!$this->keyExists($key)) {
            return;
        }

        unlink("storage/{$this->storageKey}/{$key}");
    }

    public function destroy()
    {
        $dir = opendir("storage/{$this->storageKey}");

        while (false !== ($item = readdir($dir))) {
            if (!in_array($item, ['.', '..'])) {
                unlink("storage/{$this->storageKey}/{$item}");
            }
        }
    }

    public function all()
    {
        $items = [];

        $dir = opendir("storage/{$this->storageKey}");

        while (false !== ($item = readdir($dir))) {
            if (!in_array($item, ['.', '..'])) {
                $items[$item] = file_get_contents("storage/{$this->storageKey}/{$item}");
            }
        }

        return $items;
    }

    protected function keyExists($key)
    {
        return file_exists("storage/{$this->storageKey}/{$key}");
    }
}
