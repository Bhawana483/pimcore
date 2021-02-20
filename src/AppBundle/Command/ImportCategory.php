<?php

namespace AppBundle\Command;

use Pimcore;
use Pimcore\Console\Dumper;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ImportCategory extends AbstractCommand
{
    /**
     * Configure command
     */
    protected function configure()
    {
        $type = $this->getName();
        $this
            ->setName('pimcore:import-category')
            ->setDescription('Import Category.')
            
            ->addOption("file", "f",
                InputOption::VALUE_REQUIRED,
                "Define action type")
            ->addOption(
                'params',
                'p',
                InputOption::VALUE_REQUIRED,
                'JSON Encoded Params'
                );
    }
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param Request $request
     * @var ImportDefinitionInterface $definition
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
       
        $path = $input->getOptions()['file'];
        $json = file_get_contents($path);
        $data = json_decode($json);
        foreach ($data as $cat)
        {
            $category = new \Pimcore\Model\DataObject\Category();
            $category->setKey($cat->name);
            $category->setPublished(true);
            $category->setParentId(2);
            $category->setName($cat->name);
            $category->setDescription($cat->description);
            $category->save();
        }
        $this->dump('saved');
    }
}
