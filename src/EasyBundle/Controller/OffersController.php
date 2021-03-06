<?php

namespace EasyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use EasyBundle\Form\ItemFilterType;
use EasyBundle\Entity\Offers;
use EasyBundle\Form\OffersType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class OffersController extends Controller
{
    /**
    * @Route("/offers", name="offers")
    **/

      public function offersAction(Request $request) {
          $em = $this->getDoctrine()->getEntityManager();
          $dql = "SELECT e FROM EasyBundle:Offers e ORDER BY e.id DESC";
          $query = $em->createQuery($dql);

          $paginator = $this->get('knp_paginator');
          $pagination = $paginator->paginate(
                  $query,
                  $request->query->getInt('page', 1),
                  5
          );

          return $this->render('EasyBundle:Default:offers.html.twig',
                  array('pagination' => $pagination));
      }

      /**
      * @Route("/offers/{id}")
      **/
      public function offerDetailAction($id) {
          $em = $this->getDoctrine()->getManager();
          $offer = $em->createQuery("SELECT e FROM EasyBundle:Offers e WHERE e.id = :id")->setParameter("id", $id)->getResult();
          return $this->render('EasyBundle:Default:offerdetail.html.twig',array("offer" => $offer));
      }



      /**
      * @Route("/delete/{id}")
      * @Security("has_role('ROLE_ADMIN')")
      **/
      public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
          'DELETE
             EasyBundle:Offers offer
           WHERE
             offer.id = :id'
           )
           ->setParameter("id", $id);

        $result = $query->execute();
       return $this->redirectToRoute('offers', array('status'=>'OK'));
      }


      /**
      * @Route("/update/{id}")
      * @Security("has_role('ROLE_ADMIN')")
      **/
      public function updateAction($id,Request $request){
        $em = $this->getDoctrine()->getManager();
        $offer = $em->getRepository('EasyBundle:Offers')->find($id);
        $form = $this->createForm(OffersType::class,$offer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
       // $form->getData() holds the submitted values
       // but, the original `$task` variable has also been updated
       $offer = $form->getData();
       // Recogemos el fichero
        $file=$form['picture']->getData();

        // Sacamos la extensión del fichero
        $ext=$file->guessExtension();

        // Le ponemos un nombre al fichero
        $file_name=time().".".$ext;

        // Guardamos el fichero en el directorio uploads que estará en el directorio /web del framework
        $file->move("uploads/offerPics", $file_name);

        // Establecemos el nombre de fichero en el atributo de la entidad
        $offer->setPicture($file_name);

       // ... perform some action, such as saving the task to the database
       // for example, if Task is a Doctrine entity, save it!
       $em->persist($offer);
       $em->flush();

       return $this->redirectToRoute('offers', array('status'=>'OK'));
       }
        return $this->render('EasyBundle:Default:updateoffer.html.twig',array('form' => $form->createView()));
      }

      /**
      * @Route("/newoffer")
      * @Security("has_role('ROLE_ADMIN')")
      **/

      public function nuevoAction(Request $request)
      {
      $offer = new Offers();
      $form = $this->createForm(OffersType::class,$offer);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
     // $form->getData() holds the submitted values
     // but, the original `$task` variable has also been updated
     $offer = $form->getData();
     // Recogemos el fichero
      $file=$form['picture']->getData();

      // Sacamos la extensión del fichero
      $ext=$file->guessExtension();

      // Le ponemos un nombre al fichero
      $file_name=time().".".$ext;

      // Guardamos el fichero en el directorio uploads que estará en el directorio /web del framework
      $file->move("uploads/offerPics", $file_name);

      // Establecemos el nombre de fichero en el atributo de la entidad
      $offer->setPicture($file_name);

     // ... perform some action, such as saving the task to the database
     // for example, if Task is a Doctrine entity, save it!
     $em = $this->getDoctrine()->getManager();
     $em->persist($offer);
     $em->flush();
     return $this->redirectToRoute('offers', array('status'=>'OK'));
     }
      return $this->render('EasyBundle:Default:newoffer.html.twig',array('form' => $form->createView()));
  }




  /**
   * @Route("/filter", name="filter")
   **/
   public function filterAction(Request $request)
 {

   $offers = null;

   if ($_REQUEST != NULL) {

     $description = $request->query->get("description");
     $location = $request->query->get("location");
     $area = $request->query->get("area");

   $em = $this->getDoctrine()->getEntityManager();
   $dql = "SELECT e FROM EasyBundle:Offers e WHERE e.area = :area AND e.location = :location ORDER BY e.id DESC";
   $query = $em->createQuery($dql)->setParameter("area", $area)->setParameter("location", $location);

   $paginator = $this->get('knp_paginator');
   $pagination = $paginator->paginate(
           $query,
           $request->query->getInt('page', 1),
           5
   );

   return $this->render('EasyBundle:Default:results.html.twig',
           array('pagination' => $pagination));

 }else{
   return $this->redirectToRoute('offers');
 }
}



/**
 * @Route("/area/{area}")
 **/
 public function AreaAction($area,Request $request)
{


     $em = $this->getDoctrine()->getEntityManager();
     $dql = "SELECT e FROM EasyBundle:Offers e WHERE e.area = :area ORDER BY e.id DESC";
     $query = $em->createQuery($dql)->setParameter("area", $area);

     $paginator = $this->get('knp_paginator');
     $pagination = $paginator->paginate(
             $query,
             $request->query->getInt('page', 1),
             5
     );

     return $this->render('EasyBundle:Default:area.html.twig',
             array('pagination' => $pagination));

    }
}
