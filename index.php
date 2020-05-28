<?php

require_once 'vendor/autoload.php';
require_once 'config/twig.php';
require_once 'config/doctrine.php';

$course = new \App\Entity\Course();
$course->setTitle('PHP');
$course->setLessonsCount(32);
$course->setCreatedAt(new DateTime());
$course->setUpdatedAt(new DateTime());

$group = new \App\Entity\Group();
$group->setStartDate(new DateTime('04.03.2020'));
$group->setCourse($course);
$group->setCreatedAt(new DateTime());
$group->setUpdatedAt(new DateTime());

$group2 = new \App\Entity\Group();
$group2->setStartDate(new DateTime('01.05.2020'));
$group2->setCourse($course);
$group2->setCreatedAt(new DateTime());
$group2->setUpdatedAt(new DateTime());

$student = new \App\Entity\Student();
$student->setName('Tolkachev Sergey');
$student->setEmail('sergey.tolkachev@ukr.net');
$student->setBirthday(new DateTime('27.06.1986'));
$student->setCreatedAt(new DateTime());
$student->setUpdatedAt(new DateTime());

$student1 = new \App\Entity\Student();
$student1->setName('Petrov Ivan');
$student1->setEmail('petrov.ivan@ukr.net');
$student1->setBirthday(new DateTime('15.01.1988'));
$student1->setCreatedAt(new DateTime());
$student1->setUpdatedAt(new DateTime());

$student2 = new \App\Entity\Student();
$student2->setName('Volodymyr Putin');
$student2->setEmail('moscow.mama@mail.ru');
$student2->setBirthday(new DateTime('15.09.1950'));
$student2->setCreatedAt(new DateTime());
$student2->setUpdatedAt(new DateTime());

$lesson = new \App\Entity\Lesson();
$lesson->setTitle('Lesson 18. LMS' );
$lesson->setDescription('Development of LMS');
$lesson->setGroup($group);
$lesson->setCreatedAt(new DateTime());
$lesson->setUpdatedAt(new DateTime());

$lesson2 = new \App\Entity\Lesson();
$lesson2->setTitle('Lesson 20. Symhony' );
$lesson2->setDescription('First steps1');
$lesson2->setGroup($group2);
$lesson2->setCreatedAt(new DateTime());
$lesson2->setUpdatedAt(new DateTime());

$hometask = new \App\Entity\Hometask();
$hometask->setTitle('Hometask 14.');
$hometask->setLesson($lesson);
$hometask->setDescription('Create other entities');
$hometask->setCreatedAt(new DateTime());
$hometask->setUpdatedAt(new DateTime());

$hometask2 = new \App\Entity\Hometask();
$hometask2->setTitle('Hometask 15.');
$hometask2->setLesson($lesson);
$hometask2->setDescription('Relations');
$hometask2->setCreatedAt(new DateTime());
$hometask2->setUpdatedAt(new DateTime());

$hometask3 = new \App\Entity\Hometask();
$hometask3->setTitle('Hometask 5.');
$hometask3->setLesson($lesson2);
$hometask3->setDescription('Class and object');
$hometask3->setCreatedAt(new DateTime());
$hometask3->setUpdatedAt(new DateTime());

$homework = new \App\Entity\Homework();
$homework->setHometask($hometask);
$homework->setMark('100');
$homework->setAnswerLink('https://github.com/SergeyTolkachev/hillel-lms.git');
$homework->setStudent($student);
$homework->setCreatedAt(new DateTime());
$homework->setUpdatedAt(new DateTime());

$homework2 = new \App\Entity\Homework();
$homework2->setHometask($hometask2);
$homework2->setMark('70');
$homework2->setAnswerLink('https://lalala.git');
$homework2->setStudent($student2);
$homework2->setCreatedAt(new DateTime());
$homework2->setUpdatedAt(new DateTime());

$homework3 = new \App\Entity\Homework();
$homework3->setHometask($hometask3);
$homework3->setMark('90');
$homework3->setAnswerLink('https://hillel-lms.git');
$homework3->setStudent($student1);
$homework3->setCreatedAt(new DateTime());
$homework3->setUpdatedAt(new DateTime());

$entityManager->persist($course);
$entityManager->persist($group);
$entityManager->persist($group2);
$entityManager->persist($student);
$entityManager->persist($student1);
$entityManager->persist($student2);
$entityManager->persist($lesson);
$entityManager->persist($lesson2);
$entityManager->persist($hometask);
$entityManager->persist($hometask2);
$entityManager->persist($hometask3);
$entityManager->persist($homework);
$entityManager->persist($homework2);
$entityManager->persist($homework3);

$entityManager->flush();

//$student = $entityManager->getRepository(\App\Entity\Student::class)->find(1);
//var_dump($student);