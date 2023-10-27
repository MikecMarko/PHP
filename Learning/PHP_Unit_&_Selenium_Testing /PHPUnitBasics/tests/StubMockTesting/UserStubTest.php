<?php

    use PHPUnit\Framework\TestCase;

    class UserStubTest extends TestCase
    {

        public function testCreateUser()
        {
//                $user = new \forStubMockTesting\User();
//                $mockedUser = $this->getMockBuilder(\forStubMockTesting\User::class)->getMock();

//                $mockedUser = $this->createStub(\forStubMockTesting\User::class);
//                $mocke dUser->method('save')->willReturn('save');

//                $mockedUser = $this->getMockBuilder(\forStubMockTesting\User::class)
//                ->setMethods(null)->getMock();

            $mockedUser = $this->getMockBuilder(\forStubMockTesting\User::class)
                ->disableOriginalConstructor()->setMethods(['save'])->getMock();

            $mockedUser->method('save')->willReturn(true);

            $this->assertTrue($mockedUser->createUser('mail@mail.com', 'Marko'));
            $this->assertFalse($mockedUser->createUser('mailmail.com', 'Marko'));

        }

    }