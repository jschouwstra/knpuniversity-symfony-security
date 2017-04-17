<?php
namespace AppBundle\Security;
use AppBundle\Form\LoginForm;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 17-4-2017
 * Time: 13:02
 */
class LoginformAuthenticator extends AbstractFormLoginAuthenticator
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * LoginformAuthenticator constructor.
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
        if(!$isLoginSubmit){
            return;
        }
        $form = $this->formFactory->create(LoginForm::class);
        $form->handleRequest($request);
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // TODO: Implement getUser() method.
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // TODO: Implement checkCredentials() method.
    }

    protected function getLoginUrl()
    {
        // TODO: Implement getLoginUrl() method.
    }

}