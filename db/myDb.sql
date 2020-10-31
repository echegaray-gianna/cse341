-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 12:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE category (
  categoryId SERIAL PRIMARY KEY,
  categoryName varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE client (
  clientId SERIAL PRIMARY KEY,
  clientFirstName varchar(15) NOT NULL,
  clientLastName varchar(25)  NOT NULL,
  clientEmail varchar(40) NOT NULL,
  clientPassword varchar(255)  NOT NULL,
  clientType varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE job (
  jobId SERIAL PRIMARY KEY,
  jobName varchar(50) NOT NULL,
  jobCompany varchar(50) NOT NULL,
  jobLocation varchar(50) NOT NULL,
  jobSalary varchar(50) NOT NULL,
  joRequirements text NOT NULL,
  jobResponsibilities text  NOT NULL,
  jobDescription text  NOT NULL,
  categoryId int references category(categoryId) NOT NULL,
  clientId int references client (clientId) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE resume (
  resumeId SERIAL PRIMARY KEY,
  resumeName varchar(40) NOT NULL,
  ResumePath varchar(70) NOT NULL,
  clientId int references client (clientId) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`resumeId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `resumeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




INSERT INTO client (clientFirstName, clientLastName, clientEmail, clientPassword, clientType) VALUES ('Jhon', 'Smmith', 'jhonsmith@gmail.com','password123!','Person');


INSERT INTO client (clientFirstName, clientLastName, clientEmail, clientPassword, clientType) VALUES ('Nahya', 'Ech', 'nahyaech@gmail.com','password123!','Person');


INSERT INTO client (clientFirstName, clientLastName, clientEmail, clientPassword, clientType) VALUES ('Jose', 'Taylor', 'josetaylor@gmail.com','password123!','Person');


INSERT INTO client (clientFirstName, clientLastName, clientEmail, clientPassword, clientType) VALUES ('Emma', 'Shaw', 'emmashaw@gmail.com','password123!','Person');


INSERT INTO client (clientFirstName, clientLastName, clientEmail, clientPassword, clientType) VALUES ('Erick', 'Coller', 'erickcoller@gmail.com','password123!','Person');


INSERT INTO category(categoryName) VALUES ('Quality Engineer'), ('Sofware Engineer'),('Project Owner'), ('Database Administrator'), ('Web Developer'), ('Other');

INSERT INTO category(categoryName) VALUES ('Web Developer'), ('Other');


INSERT INTO job (jobName, jobCompany, jobLocation, jobSalary, joRequirements, jobResponsibilities, jobDescription, categoryId, clientId) VALUES ('Senior Software Engineer','Lendio','Lehi, Ut','TBD','Must be willing to work in our Lehi, UT office, 5+ years professional experience, Experience with at least one object-oriented backend language, Experience with relational databases, and ability to write performant SQL queries, Ability to work in an iterative, agile process, Attention to detail, Ability to work alone and as part of a dynamic team', 'You will work with all departments and stakeholders to deliver valuable products quickly and efficiently. You get the job done by holding yourself accountable to your commitments and deadlines, and we plan our projects well so that we dont burn ourselves out. You QA your own work, and write automated tests.', 'Lendio is growing rapidly and needs motivated, capable Senior Level Fullstack Software Engineer to work at our headquarters in Lehi, UT to help us achieve our goals.', '2', '2' );

INSERT INTO job (jobName, jobCompany, jobLocation, jobSalary, joRequirements, jobResponsibilities, jobDescription, categoryId, clientId) VALUES ('Sr QA Automation Engineer (SDET)','doTERRA International','Pleasant Grove, Ut','up to $130,000', 'Minimum of 5 years writing and maintaining test automation scripts for high volume web applications. Minimum of 8 years testing applications. Technical Masters Degree preferred (Computer Science, Information Systems, Engineering, etc.). Web development (HTML, CSS, JavaScript, Ajax). Web frameworks (jQuery, Bootstrap, and similar). Data management (SQL, XML, JSON, JPA). Web services (REST, SOAP). Testing using Selenium, Appium, and Katlan Studios. Load testing using jMeter, Gatling, Grinder or similar. GIT. Continuous Integration and Delivery. Agile methodologies', 
 'Primary responsibility is to ensure quality of both of applications and systems as well as in the tests that are produced to validate those applications and systems. 
 Perform code reviews of automated tests. Perform reviews of test scripts. Research industry trends and developments in QA. Refactor tests intelligently and systematically. Senior expert in E-Commerce. Level 3 support (drives resolution when an issue is isolated to their area(s) of expertise). Assists the Development and Operations in diagnosing issues. Mentors other QA engineers. Works with the development team provides aggressive yet realistic estimates. Holds team accountable to their estimates. Create and maintain load and performance tests to accurately model customer behavior on production site.', 'The ideal candidate will be a strong team contributor, will be eager to learn, be relentless in developing their craft as a software professional will seek others experience, and will find great satisfaction in the patient pursuit of excellence. dōTERRA is an ambitious and growing international company that will provide challenge and reward for years to come.', '1', '5' );


 INSERT INTO job (jobName, jobCompany, jobLocation, jobSalary, joRequirements, jobResponsibilities, jobDescription, categoryId, clientId) VALUES ('API/Integrations Developer','Limble Solutions LLC','Lehi, Ut','up to $125,000', 'Web Development: 4 years. SaaS Industry: 4 years. Git: 2 years. JavaScript: 2 years', ' Work with the Product and Customer Success team to identify and scope out new integration opportunities. Work with SAP/Netsuite and other ERP softwares to develop integrations into Limble. Write clean, scalable code using NodeJS/SQL. Maintain, update, refactor and debug code.', 'As a Backend Developer at Limble, you will work closely with the Product and Customer Success teams to help bring to life our customers unique requests and workflows. This includes writing integrations as needed by our customers into many different kinds of systems and APIs, including but not limited to SAP, Netsuite, Microsoft Dynamics.', '5', '5' );

 INSERT INTO job (jobName, jobCompany, jobLocation, jobSalary, joRequirements, jobResponsibilities, jobDescription, categoryId, clientId) VALUES ('Senior Web Developer','Epic Marketing','Draper, Ut','TBD', 'Bachelors degree or equivalent experience or training in related field. 5 years professional experience developing custom WordPress websites. 5 years professional experience writing PHP code. Front-end development, understanding responsive builds and browser compatibility. Expertise in Adobe Creative Cloud. Ability to translate XD design comps and wireframes into working HTML templates. Expert hands-on knowledge of standards compliant HTML, XHTML, CSS3. Knowledge of JavaScript. Knowledge of MySQL database and SQL scripting.', 'Code and implement WordPress sites from XD layout through HTML/CSS to a custom theme, functions, and plugins. Maintain PHP/MySQL/HTML sites. Create and update re-usable code libraries to streamline WordPress development cycle. Suggest improvements of builds and technology. QA testing and rollout.', 'An ideal candidate must have at least 5 years of WordPress experience, and knowledge of current web development languages including HTML5, CSS3, PHP/MySQL. An understanding of responsive website design and experience optimizing front end code for performance and speed is absolutely essential.', '5', '5' );

