<?php

namespace Card\tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CardServiceTest extends KernelTestCase
{
    const DATA_CARDS = '/config/card.yaml';

    public function testExcuteCommand()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('game:play');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertNotEmpty('Value', $output);
        $this->assertNotEmpty('Color', $output);
        $this->assertNotEmpty('Rank', $output);
    }
}
