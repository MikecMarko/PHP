<?php

    use PHPUnit\Framework\TestCase;

    class UserStubTest extends TestCase
    {

        public function testCreateUser()
        {
               //$user = new \forStubMockTesting\User();

                //$mockedUser = $this->getMockBuilder(\forStubMockTesting\User::class)->getMock();

                $mockedUser = $this->createStub(\forStubMockTesting\User::);
                $mockedUser->method('save')->willReturn('save');

               $this->assertTrue($mockedUser->createUser('mail@mail.com', 'Marko'));

        }

    }