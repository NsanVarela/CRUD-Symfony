<?php
namespace AcPlatformBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use AcPlatformBundle\Form\ProductType;
use AcPlatformBundle\Form\ProductEditType;
use AcPlatformBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductController extends Controller
{

    public function createAction(Request $request)
    {
        $product = new Product();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if($request->isMethod('POST')&&$form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('ac_platform_getProduct');
        }
        return $this->render('default/form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        $datas = $em->getRepository(Product::class)->findAll();

        return $this->render('@AcPlatform/Default/show.html.twig', array('datas'=>$datas));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        $datas = $em->getRepository(Product::class)->findAll();
        
        return $this->render('@AcPlatform/Default/show.html.twig', array('datas'=>$datas));
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);

        if(!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        $form = $this->get('form.factory')->create(ProductEditType::class, $product);
        if($request->isMethod('POST')&&$form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('ac_platform_getProduct');
        }
        return $this->render('default/form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}