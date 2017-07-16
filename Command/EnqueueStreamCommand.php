<?php

/*
 * Mineur/instagram-parser-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\InstagramParserBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

use Mineur\InstagramParser\Model\InstagramPost;
use Mineur\InstagramParser\Parser\TagParser;

/**
 * Class CreateUserCommand
 * @package Mineur\TwitterStreamApiBundle\Command
 */
class EnqueueStreamCommand extends Command
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this
            ->setName('mineur:instagram-parser:enqueue')
            ->setDescription('Prompts a stream output in the console')
            ->setHelp('This command allows you to start an infinite loop to consume the Instagram tag feed')
            ->addArgument(
                'keyword',
                InputArgument::REQUIRED,
                'The keyword to track.'
            )
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    )
    {
        $output->writeln(
            AsciiArt::generate()
        );
    
        $output->writeln([
            '<comment>Keyword: </comment>' . $input->getArgument('keyword'),
            '',
            'Consuming stream ...',
            '',
            '',
        ]);
    
        /** @var TagParser $instagramParser */
        $instagramParser = $this
            ->getContainer()
            ->get('instagram_parser')
        ;
        $instagramParser
            ->parse(
                $input->getArgument('keyword'),
                function(InstagramPost $post) {
                    dump(' - Collected -> ' . $post->getId());
                    $this
                        ->getContainer()
                        ->get('rs_queue.producer')
                        ->produce('instagram_posts', $post->serialized());
                }
            )
        ;
    }

    /**
     * Get service container
     *
     * @return mixed
     */
    private function getContainer()
    {
        return $this
            ->getApplication()
            ->getKernel()
            ->getContainer();
    }
}