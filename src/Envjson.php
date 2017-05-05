<?php

namespace Envjson;

class Envjson {

    /**
     * File path.
     *
     * @var
     */
    private $path;

    /**
     * File name.
     *
     * @var
     */
    private $file_name;

    /**
     * Full path of env file.
     *
     * @var
     */
    private $full_path;

    /**
     * Variables loaded.
     *
     * @var
     */
    private $loaded;

    /**
     * Envjson constructor.
     *
     * @param string $path
     * @param string $file_name
     */
    public function __construct($path = '.', $file_name = 'env.json') {
        $this->path = $path;
        $this->file_name = $file_name;
        $this->full_path = $this->path . DIRECTORY_SEPARATOR . $this->file_name;
        $this->loaded = false;
        $this->variables = array();
    }

    public function load() {
        if(!$this->checkFileExistance()) {
            throw new \Exception('Specified file does not exists.');
        }

        $content = file_get_contents($this->full_path);

        if (!$content) {
            throw new \Exception('Cannot read file contents.');
        }

        $data = json_decode($content, true);

        if(is_null($data)) {
            throw new \Exception('Cannot decode json data.');
        }

        foreach ($data as $key => $value) {
            $_ENV[$key] = $value;
        }

        $this->loaded = true;

        return true;
    }

    /**
     * Check if file specified exists.
     *
     * @return bool
     */
    private function checkFileExistance() {
        $exists = file_exists($this->full_path);
        return $exists;
    }
}