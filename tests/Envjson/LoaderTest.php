<?php

namespace tests\Envjson;

use dnlnrs\Envjson\Loader;

class LoaderTest extends \PHPUnit_Framework_TestCase
{
    private $fixturesFolder;

    public function setUp()
    {
        $this->fixturesFolder = dirname(__DIR__) . '/fixtures';
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Specified file does not exists.
     */
    public function testEnvjsonThrowsExceptionIfUnableToLoadFile()
    {
        $loader = new Loader(__DIR__);
        $loader->load();
    }

    public function testEnvjsonLoadsEnvironmentVars()
    {
        $loader = new Loader($this->fixturesFolder, 'ok-env.json');
        $loader->load();

        $this->assertSame('BAR', $_ENV['FOO']);
        $this->assertSame('BOO', $_ENV['BAZ']);
        $this->assertSame(3, $_ENV['number']);
        $this->assertSame('z', $_ENV['char']);
        $this->assertEmpty($_ENV['EMPTY']);
    }

}