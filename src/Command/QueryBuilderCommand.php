<?php
namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\LockableTrait;
use Doctrine\ORM\EntityManagerInterface;

class QueryBuilderCommand extends Command{    
    use LockableTrait;
    private $entityManager;

    protected static $defaultName = 'query:execute';    
    protected static $defaultDescription = 'Testez le QueryBuilder';    

    protected function configure(): void 
    {        
        $this->setHelp('Testez le QueryBuilder');
        $this->addArgument('numero', InputArgument::REQUIRED, 'numéro de la requête');   
    }    
    
    public function __construct(EntityManagerInterface $entityManager)    
    {  
        parent::__construct();  
        $this->entityManager = $entityManager;    
    }  


    protected function execute(InputInterface $input, OutputInterface $output): int 
    {      
        $this->output = $output;     
        if (!$this->lock()) {
            $output->writeln('Une instance de ce programme existe déjà en mémoire.');        
            return Command::SUCCESS;    
        }
        $output->writeln([
        'Query Builder start',
        '===================',
        '',
        ]);   
        $output->writeln('Numéro de la requête: '.$input->getArgument('numero'));  
        $this->release();   
         
        $output->writeln([        
        'Query Builder end',
        '===================',        
        '',      
        ]);   

          return Command::SUCCESS;   
        }
}