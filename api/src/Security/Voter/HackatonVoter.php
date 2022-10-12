<?php
// api/src/Security/Voter/BookVoter.php

namespace App\Security\Voter;

use App\Entity\Book;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class BookVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['BOOK_CREATE', 'BOOK_READ', 'BOOK_EDIT', 'BOOK_DELETE']);
        $supportsSubject = $subject instanceof Book;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param Book $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** ... check if the user is anonymous ... **/

        switch ($attribute) {
            case 'BOOK_CREATE':
                if ( $this->security->isGranted(Role::ADMIN) ) { return true; }  // only admins can create books
                break;
            case 'BOOK_READ':
                /** ... other autorization rules ... **/
        }

        return false;
    }
}
