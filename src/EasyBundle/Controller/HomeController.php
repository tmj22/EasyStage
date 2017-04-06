<?php

namespace EasyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;

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
     * @Route("/offers")
     */
    public function OffersAction()
    {
        return $this->render('EasyBundle:Default:offers.html.twig');
    }

    /**
     * @Route("/destinations")
     */
    public function DestinationsAction()
    {
        return $this->render('EasyBundle:Default:destinations.html.twig');
    }

    /**
     * @Route("/areas")
     */
    public function AreasAction()
    {
        return $this->render('EasyBundle:Default:areas.html.twig');
    }

    /**
     * @Route("/process")
     */
    public function ProcessAction()
    {
        return $this->render('EasyBundle:Default:process.html.twig');
    }


    /**
      * @Route("/download", name="download_file")
      **/
    public function downloadFileAction(){
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
}
