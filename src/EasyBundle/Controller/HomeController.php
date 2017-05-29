<?php

namespace EasyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use EasyBundle\Entity\Offers;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
      return $this->render('EasyBundle:Default:index.html.twig');
    }

    /**
     * @Route("/easystage")
     */
    public function AboutAction()
    {
        return $this->render('EasyBundle:Default:easystage.html.twig');
    }

    /**
     * @Route("/europeanprojects")
     */
    public function EuropeanAction()
    {
        return $this->render('EasyBundle:Default:europeanprojects.html.twig');
    }



    /**
     * @Route("/destinations")
     */
    public function DestinationsAction()
    {
        return $this->render('EasyBundle:Default:destinations.html.twig');
    }

    /**
     * @Route("/internship")
     */
    public function InternshipAction()
    {
        return $this->render('EasyBundle:Default:internship.html.twig');
    }

    /**
     * @Route("/process")
     */
    public function ProcessAction()
    {
        return $this->render('EasyBundle:Default:process.html.twig');
    }

    /**
     * @Route("/activities")
     */
    public function ActivitiesAction()
    {
        return $this->render('EasyBundle:Default:activities.html.twig');
    }

    /**
     * @Route("/ecotur")
     */
    public function EcoturAction()
    {
        return $this->render('EasyBundle:Default:ecotur.html.twig');
    }

    /**
     * @Route("/courses")
     */
    public function CoursesAction()
    {
        return $this->render('EasyBundle:Default:courses.html.twig');
    }

    /**
     * @Route("/accommodation")
     */
    public function AccommodationAction()
    {
        return $this->render('EasyBundle:Default:accommodation.html.twig');
    }


    /**
      * @Route("/download", name="download_file")
      **/
    public function DownloadFileAction(){
      $publicResourcesFolderPath = $this->get('kernel')->getRootDir() . '/../web/';
          $filename = "brochure.pdf";

          // This should return the file to the browser as response
          $response = new BinaryFileResponse($publicResourcesFolderPath.$filename);

          // To generate a file download, you need the mimetype of the file
          $mimeTypeGuesser = new FileinfoMimeTypeGuesser();

          // Set the mimetype with the guesser or manually
          if($mimeTypeGuesser->isSupported()){
              // Guess the mimetype of the file according to the extension of the file
              $response->headers->set('Content-Type', $mimeTypeGuesser->guess($publicResourcesFolderPath.$filename));
          }else{
              // Set the mimetype of the file manually, in this case for a text file is text/plain
              $response->headers->set('Content-Type', 'text/plain');
          }

          // Set content disposition inline of the file
          $response->setContentDisposition(
              ResponseHeaderBag::DISPOSITION_ATTACHMENT,
              $filename
          );

          return $response;
      }



      /**
       * @Route("/contact")
       */
      public function ContactAction()
      {
          return $this->render('EasyBundle:Default:contact.html.twig');
      }

      /**
       * @Route("/mail",name="mail")
       */
       public function MailAction(Request $request)
{


  if ($_REQUEST != NULL) {

    $subject = $request->request->get("subject");
    $from = $request->request->get("from");
    $body = $request->request->get("message");



    $message = \Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom($from)
        ->setTo('tom_mj91@hotmail.com')
        ->setBody($body);


  $this->get('mailer')->send($message);
    //$response =new Response();
    //$response->setContent(var_dump($curriculum->getRealPath()));
    //return $response;
        return $this->render('EasyBundle:Default:index.html.twig');
    }else{
      //return $response;
        return $this->render('EasyBundle:Default:contact.html.twig');
    }


    }


          /**
           * @Route("/apply")
           */
          public function ApplyAction()          {
              return $this->render('EasyBundle:Default:apply.html.twig');
          }
          /**
           * @Route("/send",name="send")
           */
           public function SendAction(Request $request){
      if ($_REQUEST != NULL) {

        $subject = $request->request->get("subject1");
        $from = $request->request->get("from1");
        $body = $request->request->get("message1");
        $curriculum = $request->files->get("fichero1");


        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo('tom_mj91@hotmail.com')
            ->setBody($body);

            $message->attach(\Swift_Attachment::fromPath($curriculum->getRealPath())->setFilename('curriculum.pdf'));
      $this->get('mailer')->send($message);
        //$response =new Response();
        //$response->setContent(var_dump($curriculum->getRealPath()));
        //return $response;
            return $this->render('EasyBundle:Default:index.html.twig');
        }else{
          //return $response;
            return $this->render('EasyBundle:Default:apply.html.twig');
        }


        }


        /**
         * @Route("/availability")
         */
        public function AvailabilityAction()          {
            return $this->render('EasyBundle:Default:availability.html.twig');
        }
        /**
         * @Route("/check",name="check")
         */
         public function CheckAction(Request $request){
    if ($_REQUEST != NULL) {

      $subject = $request->request->get("subject2");
      $from = $request->request->get("from2");
      $message = $request->request->get("message2");
      $name = $request->request->get("name");
      $lastname = $request->request->get("lastname");
      $accommodation = $request->request->get("accommodation");
      $date = $request->request->get("date");



      $message = \Swift_Message::newInstance()
          ->setSubject($subject)
          ->setFrom($from)
          ->setTo('tom_mj91@hotmail.com')
          ->setBody($this->renderView('EasyBundle:Default:checkmail.html.twig',
                array('name' => $name,'lastname' => $lastname,'message' => $message, 'accommodation' => $accommodation, 'date' => $date)
            ),
            'text/html');


    $this->get('mailer')->send($message);
      //$response =new Response();
      //$response->setContent(var_dump($curriculum->getRealPath()));
      //return $response;
          return $this->render('EasyBundle:Default:index.html.twig');
      }else{
        //return $response;
          return $this->render('EasyBundle:Default:availability.html.twig');
      }
      }




        /**
          * @Route("/template/{language}", name="template_file")
          **/
        public function DownloadTemplateAction($language){
          $publicResourcesFolderPath = $this->get('kernel')->getRootDir() . '/../web/';
          if ($language == "esp") {
          $filename = "template.doc";
        }else{$filename = "templateENG.doc";}





              // This should return the file to the browser as response
              $response = new BinaryFileResponse($publicResourcesFolderPath.$filename);

              // To generate a file download, you need the mimetype of the file
              $mimeTypeGuesser = new FileinfoMimeTypeGuesser();

              // Set the mimetype with the guesser or manually
              if($mimeTypeGuesser->isSupported()){
                  // Guess the mimetype of the file according to the extension of the file
                  $response->headers->set('Content-Type', $mimeTypeGuesser->guess($publicResourcesFolderPath.$filename));
              }else{
                  // Set the mimetype of the file manually, in this case for a text file is text/plain
                  $response->headers->set('Content-Type', 'text/plain');
              }

              // Set content disposition inline of the file
              $response->setContentDisposition(
                  ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                  $filename
              );

              return $response;
          }
}
