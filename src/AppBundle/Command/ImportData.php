<?php

// namespace AppBundle\Command\Pimcore\Model\DataObject\Product;
namespace AppBundle\Command;
// namespace AppBundle\Command\ImportDefinitionInterface\ImportDefinitionInterface;

use Pimcore;
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Pimcore\Model\Asset\MetaData\ClassDefinition\Data\DataObject;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
// use AppBundle\Command\ImportDefinitionInterface\ImportDefinitionInterface;
// use Pim\AppBundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Pimcore\Model\DataObject\Category;
use Pimcore\Model\DataObject\Brand;
use Pimcore\Model\DataObject\Fabric;


class ImportData extends AbstractCommand
{
    /**
     * Configure command
     */
    protected function configure()
    {
        $this
            ->setName('pimcore:importdata')
            ->setDescription('Import Data From CSV/JSON File.')
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
     * @var ImportDefinitionInterface $definition
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $now = date('c');
        // $message = sprintf("Current date and time: %s", $now);
        // $output->writeln($message);


        $path = $input->getOptions()['file'];
        $json = file_get_contents($path);
        $data = json_decode($json);
        foreach ($data as $entry)
        {
            $fabric = new Pimcore\Model\DataObject\Category\Listing();
            $object = new \Pimcore\Model\DataObject\Product();
            $fabric->setCondition("name = ?", 'jeans');
            // $fabric->addConditionParam("Description = ?", 'description');
            // $fabric->setWashable(true);
            $fabric->setLimit(1);
    
            foreach($fabric as $entry){
                return($entry); 
                die;
            }
            $object->setCategory($entry);

            
            $object->setKey($entry->name);
            $object->setPublished(true);
            $object->setParentId(10);
            $object->setName($entry->name);
            $object->setDescription($entry->description);
            $object->setSku($entry->sku);
            $object->setPrice($entry->price);
            $object->setGender($entry->gender);
            $object->setFabric($entry->fabric);
            $object->setBrand($entry->brand);
            $object->setMadeIn($entry->madeIn);
            $object->setdiscount($entry->discount);
            $object->setSize($entry->size);
            $object->setPockets($entry->pockets);
            $object->setNeckShape($entry->neckShape);
            $object->setSleeves($entry->sleeves);
            $object->setLength($entry->length);

            $t = new \Pimcore\Model\DataObject\Data\RgbaColor();
            $t->setRgba($entry->color);
            $object->setColor($t);

            $objectBrick = new DataObject\Objectbrick\Data\Shirt($object);
                $objectBrick->setSleeves($entry->sleeves);
                $objectBrick->setSuitableFor($entry->suitable);
                $object->getClassification()->setShirt($objectBrick);
            
            $image = \Pimcore\Model\Asset\Image::getByPath("/images/floralShirt.jpeg");
            $object->setProductImage($image);
            
            $object->save();
        }
        $this->dump('Imported Successfully');

        // create single object
        // $object = new Pimcore\Model\DataObject\Product();    
       
        // $object->setKey('new16');
        // $object->setParentId(10);
        // $object->setPublished(true);
        // $object->setName('Casual Shirt');
        // $object->setSku(15489);
        // $object->setColor('#325286ff');
        // $object->setPrice(500);
        // $object->setGender("Female");
        // $object->setFabric("Slik");
        // $object->setBrand("Gucci");
        // $object->setMadeIn("India");
        // $object->setGender("female");
        // $object->setSize("M");
        // $fabric = new Pimcore\Model\DataObject\Category\Listing();
        // $fabric->setCondition("Name = ?", 'jeans');
        // $fabric->addConditionParam("Description = ?", 'description');
        // // $fabric->setDescription("description = ?", 'description');
        // // $fabric->setWashable(true);
        // $fabric->setLimit(1);

        // // foreach($fabric as $entry){
        // //     return $entry;
        // // }
        // // $object->setFabric($entry);
       
        // $object->setMadeIn("IN");
        
        // $object->setDiscount(40);
        // $object->setDescription('description');
        // // $objBrick = new DataObject\Objectbrick\Data\Shirt($object);
        // // $objBrick->setSleeves("Sleeveless","Full Sleeve");
        // // $object->getDefinition()->getFieldDefinition()->setShirt($objBrick);
        // $object->save();        
    }
}