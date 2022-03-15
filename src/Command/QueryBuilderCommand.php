<?php
namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\LockableTrait;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Console\Helper\Table;

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
        $result = null;
        switch($input->getArgument('numero')){
            case 1 : $output->writeln("Liste des Users triés par ordre alphabétique sur le nom");
                $result = $this->entityManager->getRepository(User::class)->Users(11);
                break;
            default: $output->writeln("Valeur non référencée");
                break;
            }
        if($result){ 
        if (count($result)>0){
        $table = new Table($output);
        $table->setHeaders($result[0]->getHeader()); 
        $rows = array();
        foreach ($result as $r){
        $rows[] = $r->getRow();
        }
        $table->setRows($rows);
        $table->render();
            }
        }
        $this->release();

        $output->writeln([
        'Query Builder end',
        '===================',
        '',
        ]);
        return Command::SUCCESS;
        }
    }