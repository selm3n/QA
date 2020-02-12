<?php

namespace App\Service;


use App\Entity\QuestionHistoric;
use Doctrine\ORM\EntityManagerInterface;

class ExportService
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function exportCSVAction()
    {
        $results = $this->em->getRepository(QuestionHistoric::class)->findAll();

        //var_dump($results);die();
        if ($results) {
            $csvPath = 'C:\wamp64\www\QA\file.csv';//'C:\Users\User\Desktop\file.csv';//'C:\file.csv';

            $csvh = fopen($csvPath, 'w+');
            $d = ','; // this is the default but i like to be explicit
            $e = '"'; // this is the default but i like to be explicit

            foreach ($results as $record) {
                $data = $record->toArray(false); // false for the shallow conversion
                fputcsv($csvh, $data, $d, $e);
            }

            fclose($csvh);

            // do something with the file
        }


        return true;
    }
}
