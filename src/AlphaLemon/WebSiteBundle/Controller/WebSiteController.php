<?php

namespace AlphaLemon\WebSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AlphaLemon\ThemeEngineBundle\Controller\TemplateController;

class WebSiteController extends TemplateController
{
    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
        $this->setUpPageTree('home');

        // Retrieve the pageTree object from the container
        $pageTree = $this->container->get('al_page_tree');

        // Adds a new content into the slogan_box slot
        $pageTree->addContent('content', array('HtmlContent' => '<h1>Welcome to AlphaLemon ThemeBundle</h1><p>Enjoy the ThemeEngineBundle</p>')); 

        // Defines the template to render
        $template = sprintf('%s:Theme:%s.html.twig', $pageTree->getThemeName(), $pageTree->getTemplateName());

        // Renders the template
        return $this->render($template, array('metatitle' => 'A site powered by AlphaLemonThemesBuilder bundle',
                                             'metadescription' => '',
                                             'metakeywords' => '',
                                             'internal_stylesheets' => '', // or $pageTree->getInternalStylesheet()
                                             'internal_javascripts' => '', // or $pageTree->getInternalJavascript(),
                                             'stylesheets' => $pageTree->getExternalStylesheetsForWeb(),
                                             'javascripts' => $pageTree->getExternalJavascriptsForWeb(),
                                             'base_template' =>  $this->container->getParameter('althemes.base_template')));
    }
}
