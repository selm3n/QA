<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Question;
use App\Form\QuestionType;
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
    $form = $this->createForm(QuestionType::class, $question);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($question);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }
}