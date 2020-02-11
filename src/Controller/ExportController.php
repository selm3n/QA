<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Component\HttpFoundation\Request;


use FOS\RestBundle\Controller\Annotations as Rest;



use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\QuestionHistoric;

use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use \Doctrine\Common\Collections\Collection;


/**
 * ExportController controller.
 * @Route("/api", name="api_")
 */
class ExportController extends FOSRestController
{
    /**
     * Lists all Questions.
     * @Rest\Get("/export")
     *
     * @return Response
     */
    public function exportCSVAction()
    {
        $results = $this->getDoctrine()->getManager()
            ->getRepository(QuestionHistoric::class)->findAll();

            //var_dump($results);die();
            if($results) {
                $csvPath = 'C:\file.csv';
             
                $csvh = fopen($csvPath, 'w');
                $d = ','; // this is the default but i like to be explicit
                $e = '"'; // this is the default but i like to be explicit
             
                foreach($results as $record) {
                    $data = $record->toArray(false); // false for the shallow conversion
                    fputcsv($csvh, $data, $d, $e);
                }
             
                fclose($csvh);
             
               // do something with the file
             }
             
             
        return true;
    }
}
