<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\QuestionHistoric;

/**
 * Question controller.
 * @Route("/api", name="api_")
 */
class QuestionController extends FOSRestController
{
    /**
     * Lists all Questions.
     * @Rest\Get("/questions")
     *
     * @return Response
     */
    public function getQuestionAction()
    {
        $repository = $this->getDoctrine()->getRepository(Question::class);
        $questions = $repository->findall();
        return $this->handleView($this->view($questions));
    }
    /**
     * Create Question.
     * @Rest\Post("/question")
     *
     * @return Response
     */
    public function postQuestionAction(Request $request)
    {
        $question = new Question();
        //$answer = new Answer();
        $form = $this->createForm(QuestionType::class, $question);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $an = $question->getAnswers();
            for( $i=0;$i<sizeof($an);$i++ ){
                $an[$i]->setQuestion($question);
            }
            $em->flush();

            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        } else {
            var_dump('error data', $data);
            return $this->handleView($this->view($form->getErrors()));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
    /**
     * update Question.
     * @Rest\Post("/question/update")
     *
     * @return Response
     */
    public function updateQuestionAction(Request $request)
    {
        $id =$request->request->get("id");
        $title =$request->request->get("title");
        $status =$request->request->get("status");
        if(!$id){
            $response=array(
                'code'=>400,
                'message'=>"No parameter id received ",
                'result'=>false
            );
            return new JsonResponse($response,400);
        }
        if(!$title){
            $response=array(
                'code'=>400,
                'message'=>"No parameter title received ",
                'result'=>false
            );
            return new JsonResponse($response,400);
        }
        if(!$status){
            $response=array(
                'code'=>400,
                'message'=>"No parameter status received ",
                'result'=>false
            );
            return new JsonResponse($response,400);
        }

        $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository(Question::class)->findOneBy(['id' => $id]);
            if (!$entity) {
                $response=array(
                    'code'=>404,
                    'message'=>"No Data Found ",
                    'result'=>false
                );
                return new JsonResponse($response,404);
            }else{
                
                $entity->setTitle($title);
                $entity->setStatus($status);
                
                $em->merge($entity);
                

                $questionhistoric = new QuestionHistoric();
                $questionhistoric->setTitle($title);
                $questionhistoric->setStatus($status);
                $questionhistoric->setQuestion($entity);

                $em->persist($questionhistoric);

                $em->flush();
                $response=array(
                    'code'=>200,
                    'message'=>"success ",
                    'data'=>$entity
                );
                return new JsonResponse($response,200);

            }
    }
}
