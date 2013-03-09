# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: prereqme.cdxj1iemkunh.us-east-1.rds.amazonaws.com (MySQL 5.5.27-log)
# Database: PrereqMe
# Generation Time: 2013-03-09 03:41:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pm_coreq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_coreq`;

CREATE TABLE `pm_coreq` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `course2Id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_coreq` WRITE;
/*!40000 ALTER TABLE `pm_coreq` DISABLE KEYS */;

INSERT INTO `pm_coreq` (`id`, `courseId`, `course2Id`)
VALUES
	(1,5,6),
	(2,9,10),
	(3,11,12),
	(4,14,15),
	(5,37,38),
	(6,50,51),
	(7,57,58);

/*!40000 ALTER TABLE `pm_coreq` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_course`;

CREATE TABLE `pm_course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deptId` bigint(20) unsigned NOT NULL,
  `title` varchar(256) NOT NULL,
  `code` int(11) NOT NULL,
  `credits` smallint(6) NOT NULL DEFAULT '0',
  `description` varchar(512) NOT NULL DEFAULT '""',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `deparmentId` (`deptId`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_course` WRITE;
/*!40000 ALTER TABLE `pm_course` DISABLE KEYS */;

INSERT INTO `pm_course` (`id`, `deptId`, `title`, `code`, `credits`, `description`)
VALUES
	(1,1,'Computer Science and Its Applications ',1100,4,'Introduces students to the field of computer science and the patterns of thinking that enable them to become intelligent users of software tools in a problem-solving setting. Examines several important software applications so that students may develop the skills necessary to use computers effectively in their own disciplines.'),
	(2,1,'Computer Science/Information Science Overview 1',1200,1,'Introduces students to the College of Computer and Information Science (CCIS) and begins their preparation for careers in the computing and information fields. Offers students an opportunity to learn how to thrive at Northeastern and within CCIS by developing academic, professional, and interpersonal skills. Covers the variety of careers available in the high-technology professions. Students work in groups to create and deliver presentations on careers in the field.'),
	(3,1,'Computer Science/Information Science Overview 2: Co-op Preparation',1210,1,'Continues the preparation of students for careers in the computing and information fields by discussing co-op and co-op processes. Offers students an opportunity to prepare a professional r?sum?; practice proper interviewing techniques; explore current job opportunities; learn how to engage in the job and referral process; and to understand co-op policies, procedures, and expectations. Discusses professional behavior and ethical issues in the workplace.'),
	(4,1,'Computer/Information Science Co-op Preparation',1220,1,'Prepares students for co-op through topics such as ethics, privacy, security, responsibility, and intellectual property. Exposes students to popular industry technologies. ? Prerequisite: Intended for transfer students into computer/information science who are above the freshman level.'),
	(5,1,'Algorithms and Data Structures for Engineering',1500,4,'Introduces algorithms and data structures for engineering students. Discusses data structures such as arrays, stacks, queues, and lists, and the algorithms that manipulate these structures. Introduces simple algorithm analysis. Discusses classes and objects and presents the basic material about encapsulation, inheritance, and polymorphism. Introduces software development practices such as modular design, use of libraries, testing methods, and debugging techniques.'),
	(6,1,'Lab for CS 1500',1501,1,'Accompanies CS 1500. Covers topics from the course through various experiments. ? Prerequisite: Not open to students in the College of Computer and Information Science.'),
	(7,1,'Discrete Structures',1800,4,'Introduces the mathematical structures and methods that form the foundation of computer science. Studies structures such as sets, tuples, sequences, lists, trees, and graphs. Discusses functions, relations, ordering, and equivalence relations. Examines inductive and recursive definitions of structures and functions. Discusses principles of proof such as truth tables, inductive proof, and basic logic. Also covers the counting techniques and arguments needed to estimate the size of sets, the growth of functio'),
	(8,1,'Recitation for CS 1800',1801,0,'Accompanies CS 1800. Provides students with additional opportunities to ask questions and to see sample problems solved in detail. '),
	(9,1,'Fundamentals of Computer Science 1',2500,4,'Introduces the fundamental ideas of computing and the principles of programming. Discusses a systematic approach to word problems, including analytic reading, synthesis, goal setting, planning, plan execution, and testing. Presents several models of computing, starting from nothing more than expression evaluation in the spirit of high school algebra. No prior programming experience is assumed; therefore, suitable for freshman students, majors and nonmajors alike who wish to explore the intellectual ideas in'),
	(10,1,'Lab for CS 2500',2501,1,'Accompanies CS 2500. Covers topics from the course through various experiments.'),
	(11,1,'Fundamentals of Computer Science 2',2510,4,'Continues CS 2500. Examines object-oriented programming and associated algorithms using more complex data structures as the focus. Discusses nested structures and nonlinear structures including hash tables, trees, and graphs. Emphasizes abstraction, encapsulation, inheritance, polymorphism, recursion, and object-oriented design patterns. Applies these ideas to sample applications that illustrate the breadth of computer science. ? Prerequisite: CS 2500 (may be taken concurrently).'),
	(12,1,'Lab for CS 2510',2511,1,'Accompanies CS 2510. Covers topics from the course through various experiments. '),
	(13,1,'Computer Organization',2600,4,'Introduces the basic design of computing systems. Covers central processing unit (CPU), memory, input, and output. Provides a complete introduction to assembly language such as the basics of an instruction set plus experience in assembly language programming using a RISC architecture. Uses system calls and interrupt-driven programming to show the interaction with the operating system. Covers machine representation of integers, characters, and floating-point numbers. Describes caches and virtual memory. '),
	(14,1,'Logic and Computation',2800,4,'Introduces formal logic and its connections to computer and information science. Offers an opportunity to learn to translate statements about the behavior of computer programs into logical claims and to gain the ability to prove such assertions both by hand and using automated tools. Considers approaches to proving termination, correctness, and safety for programs. Discusses notations used in logic, propositional and first order logic, logical inference, mathematical induction, and structural induction. Int'),
	(15,1,'Lab for CS 2800',2801,1,'Accompanies CS 2800. Covers topics from the course through various experiments'),
	(16,1,'Honors Freshman Seminar 1',2900,1,'Introduces a variety of topics that extend the material in the standard freshman computer courses or go beyond the scope of these courses. '),
	(17,1,'Honors Freshman Seminar 2',2901,1,'Introduces a variety of topics that extend the material in the standard freshman computer courses or go beyond the scope of these courses. '),
	(18,1,'Database Design',3200,4,'Studies the design of a database for use in a relational database management system. The entity-relationship model and normalization are used in problems. Relational algebra and then the SQL (structured query language) are presented. Advanced topics include triggers, stored procedures, indexing, elementary query optimization, and fundamentals of concurrency and recovery. Students implement a database schema and short application programs on one or more commercial relational database management systems. '),
	(19,1,'Object-Oriented Design',3500,4,'Presents a comparative approach to object-oriented programming and design. Discusses the concepts of object, class, meta-class, message, method, inheritance, and genericity. Reviews forms of polymorphism in object-oriented languages. Contrasts the use of inheritance and composition as dual techniques for software reuse: forwarding vs. delegation and subclassing vs. subtyping. Fosters a deeper understanding of the principles of object-oriented programming and design including software components, object-orie'),
	(20,1,'Programming in C++',3520,4,'Examines how to program in C++ in a robust and safe manner. Reviews basics, including scoping, typing, and primitive data structures. Discusses data types (primitive, array, structure, class, string); addressing/parameter mechanisms (value, pointer, reference); stacks; queues; linked lists; binary trees; hash tables; and the design of classes and class inheritance, emphasizing single inheritance. Considers the instantiation of objects, the trade-offs of stack vs. heap allocation, and the design of construct'),
	(21,1,'Game Programming',3540,4,'Introduces the different subsystems used to create a 3D game, including rendering, animation, collision, physics, audio, trigger systems, game logic, behavior trees, and simple artificial intelligence. Offers students an opportunity to learn the inner workings of game engines and how to use multiple libraries such as physics and graphics libraries to develop a game. Discusses graphics pipeline, scene graph, level design, behavior scripting, object-oriented game design, world editors, and game scripting lang'),
	(22,1,'Game Algorithms ',3560,4,'Covers the algorithms that are important for game design, including graphics management algorithms (animation, scene graph, level of detail); artificial intelligence algorithms (search, decision-making, and sensing); and other important algorithmic issues (networking, threading, and input processing). Students work on several individual assignments to apply the algorithms and then develop a project in a team using a game engine. Offers students an opportunity to learn team/project management, work division,'),
	(23,1,'Systems and Networks',3600,4,'Introduces the basic concepts underlying computer operating systems and computer networks and provides hands-on experience with their implementation. Covers the basic structure of an operating system: application interfaces, processes, threads, synchronization, interprocess communication, processor allocation, deadlocks, memory management, file systems, and input/output control. Also introduces network architectures, network topologies, network protocols, layering concepts (for example, ISO/OSI, TCP/IP refe'),
	(24,1,'Theory of Computation',3800,4,'Introduces the theory behind computers and computing aimed at answering the question, ?What are the capabilities and limitations of computers?? Covers automata theory, computability, and complexity. The automata theory portion includes finite automata, regular expressions, nondeterminism, nonregular languages, context-free languages, pushdown automata, and noncontext-free languages. The computability portion includes Turing machines, the Church-Turing thesis, decidable languages, and the Halting theorem. Th'),
	(25,1,'Senior Seminar',4000,1,'Requires students to give a twenty- to thirty-minute formal presentation on a topic of their choice in computer science. Prepares students for this talk by discussing methods of oral presentation, how to present technical material, how to choose what topics to present, overall organization of a talk, and use of presentation software and other visual aids. '),
	(26,1,'Artificial Intelligence',4100,4,'Introduces the fundamental problems, theories, and algorithms of the artificial intelligence field. Includes heuristic search; knowledge representation using predicate calculus; automated deduction and its applications; planning; and machine learning. Additional topics include game playing; uncertain reasoning and expert systems; natural language processing; logic for common-sense reasoning; ontologies; and multiagent systems.'),
	(27,1,'Database Internals',4200,4,'Explores the internal workings of database management systems. Explains how database systems store data on disks. Studies how to improve query efficiency using index techniques such as B+-tree, hash indices, and multidimensional indices. Describes how queries are executed internally and how database systems perform query optimizations. Introduces concurrency control schemes implemented by locking, such as hierarchical locking and key range locking. Describes lock table structure. Discusses how database syst'),
	(28,1,'Parallel Data Processing in MapReduce',4240,4,'Introduces the MapReduce programming model and the core technologies it relies on in practice, such as a distributed file system and the distributed consensus protocol. Also discusses related approaches and technologies from distributed databases and cloud computing. Emphasizes practical examples and hands-on programming experiences. Examines both plain MapReduce and database-inspired advanced programming models running on top of a MapReduce infrastructure.'),
	(29,1,'Computer Graphics',4300,4,'Charts a path through every major aspect of computer graphics with varying degrees of emphasis. Discusses hardware issues: size and speed; lines, polygons, and regions; modeling, or objects and their relations; viewing, or what can be seen (visibility and perspective); rendering, or how it looks (properties of surfaces, light, and color); transformations, or moving, placing, distorting, and animating and interaction, or drawing, selecting, and transforming. '),
	(30,1,'Programming Languages',4400,4,'Introduces a systematic approach to understanding the behavior of programming languages. Covers interpreters; static and dynamic scope; environments; binding and assignment; functions and recursion; parameter-passing and method dispatch; objects, classes, inheritance, and polymorphism; type rules and type checking; and concurrency.'),
	(31,1,'Compilers',4410,4,'Studies the construction of compilers and integrates material from earlier courses on programming languages, automata theory, computer architecture, and software design. Examines syntax trees; static semantics; type checking; typical machine architectures and their software structures; code generation; lexical analysis; and parsing techniques. Uses a hands-on approach with a substantial term project'),
	(32,1,'Software Development ',4500,4,'Considers software development as a systematic process involving specification, design, documentation, implementation, testing, and maintenance. Examines software process models; methods for software specification; modularity, abstraction, and software reuse; and issues of software quality. Students, possibly working in groups, design, document, implement, test, and modify software projects.'),
	(33,1,'Software Testing',4510,4,'Examines the software development process from the point of view of testing. Focuses on unit testing, white- and black-box testing, randomized testing, the design of equality comparison, and the design of a test tool that evaluates the tests and reports the results. Next considers integration testing, stress tests and other performance tests, testing automation, and other techniques for assuring correctness and integrity of programs with several interacting components. Explores tools for measuring code qual'),
	(34,1,'Mobile Application Development ',4520,4,'Focuses on mobile application development on a mobile phone or related platform. Discusses memory management; user interface building, including both MVC principles and specific tools; touch events; data handling, including core data, SQL, XML, and JSON; network techniques and URL loading; and, finally, specifics such as GPS and motion sensing that may be dependent on the particular mobile platform. Students are expected to work on a project that produces a professional-quality mobile application. The instr'),
	(35,1,'Web Development ',4550,4,'Discusses Web development for sites that are dynamic, data driven, and interactive. Focuses on the software development issues of integrating multiple languages, assorted data technologies, and Web interaction. Considers ASP.NET, C#, HTTP, HTML, CSS, XML, XSLT, JavaScript, AJAX, RSS/Atom, SQL, and Web services. Requires each student to deploy individually designed Web experiments that illustrate the Web technologies and at least one major integrative Web site project. Students may work as a team with the pe'),
	(36,1,'Topics in Operating Systems',4600,4,'Studies advanced concepts underlying computer operating systems and computer networks. Examines in depth all major operating-system and network components including device drivers, network protocol stacks, memory managers, centralized and distributed file systems, interprocess communication mechanisms, real-time schedulers, and security mechanisms. Additional components are covered as time permits. Provides hands-on experience with the source code of commercial-grade operating systems and networks.'),
	(37,1,'Robotic Science and Systems ',4610,4,'Introduces autonomous mobile robots, with a focus on algorithms and software development, including closed-loop control, robot software architecture, wheeled locomotion and navigation, tactile and basic visual sensing, obstacle detection and avoidance, and grasping and manipulation of objects. Offers students an opportunity to progressively construct mobile robots from a predesigned electromechanical kit. The robots are controlled wirelessly by software of the students? own design, built within a provided r'),
	(38,1,'Lab for CS 4610',4611,1,'Offers a laboratory course to accompany CS 4610.'),
	(39,1,'High Performance Computing',4650,4,'Introduces students to research in the domain of high-performance computing. Each instance of this course covers a single topic with broad open questions. The required systems background needed to investigate these questions is covered in the first part of the course. Then, working in teams, students have an opportunity to address different aspects of the open questions so that in combination the entire class may learn more than any single team could accomplish. Example topics include use of new hardware su'),
	(40,1,'Network Fundamentals',4700,4,'Introduces the fundamental concepts of network protocols and network architectures. Presents the different harmonizing functions needed for the communication and effective operation of computer networks. Provides in-depth coverage of data link control, medium access control, routing, end-to-end transport protocols, congestion and flow control, multicasting, naming, auto configuration, quality of service, and network management. Studies the abstract mechanisms and algorithms as implemented in real-world Inte'),
	(41,1,'Network Security',4740,4,'Studies topics related to Internet architecture and cryptographic schemes in the context of security. Provides advanced coverage of the major Internet protocols including IP and DNS. Examines denial of service, viruses, and worms, and discusses techniques for protection. Covers cryptographic paradigms and algorithms such as RSA and Diffie-Hellman in sufficient mathematical detail. The advanced topics address the design and implementation of authentication protocols and existing standardized security protoco'),
	(42,1,'Secure Wireless Ad Hoc Robots on Mission (SWARM) 1',4750,4,'Introduces the concepts underlying the design of robust and secure heterogeneous wireless networking of mobile robots: Internetworking, security, wireless communication, embedded development, and mobile phone platforms. Students form mixed teams with the goal of designing and building rescue-mission-oriented heterogeneous wireless systems operating in adversarial environments. These systems consist of off-the-shelf robots enhanced by the students with a low-power control and sensing embedded system; a low-p'),
	(43,1,'Secure Wireless Ad Hoc Robots on Mission (SWARM) 2',4760,4,'Continues CS 4750. Based on the experiences in CS 4750, student teams have an opportunity to build more autonomous systems that can navigate areas where wireless communication or direct visibility are not possible. The systems must be resilient to more sophisticated denial-of-service attacks and need to more carefully account for energy consumption expended on mobility, communication, and meeting the mission task. Graduate students are expected to make a research contribution. '),
	(44,1,'Algorithms and Data',4800,4,'Introduces the basic principles and techniques for the design, analysis, and implementation of efficient algorithms and data representations. Discusses asymptotic analysis and formal methods for establishing the correctness of algorithms. Considers divide-and-conquer algorithms, graph traversal algorithms, and optimization techniques. Introduces information theory and covers the fundamental structures for representing data. Examines flat and hierarchical representations, dynamic data representations, and da'),
	(45,1,'Honors Senior Seminar',4900,4,'Offers a capstone course for computer science honors students. Exposes students to one or more topics of current interest in computer science. Requires students to prepare a one-hour presentation on a topic in computer science and to write a paper on that topic. ? Prerequisite: Senior standing and Honors Program participation; computer/information science students only. '),
	(46,1,'Computer Science Topics',4910,4,'Offers a lecture course in computer science on a topic not regularly taught in a formal course. Topics may vary from offering to offering. ? Prerequisite: CS 3500, CS 3800, and permission of instructor. '),
	(47,1,'Computer Science Project',4920,4,'Focuses on students developing a substantial software or hardware artifact under faculty supervision. '),
	(48,1,'Junior/Senior Honors Project 1',4970,4,'Focuses on in-depth project in which a student conducts research or produces a product related to the student?s major field. Culminating experience in the University Honors Program. Combined with Junior/Senior Project 2 or college-defined equivalent for 8 credit honors project.'),
	(49,1,'Junior/Senior Honors Project 2',4971,4,'Focuses on second semester of in-depth project in which a student conducts research or produces a product related to the student?s major field. Culminating experience in the University Honors Program. '),
	(50,1,'Programming Design Paradigm',5010,4,'Introduces modern program design paradigms. Starts with functional program design, introducing the notion of a design recipe. The latter consists of two parts: a task organization (ranging from the description of data to the creation of a test suite) and a data-oriented approach to the organization of programs (ranging from atomic data to self-referential data definitions and functions as data). The course then progresses to object-oriented design, explaining how it generalizes and contrasts with functional'),
	(51,1,'Recitation for CS 5010',5011,0,'Provides small-group discussion format to cover material in CS 5010.'),
	(52,1,'Foundations of Artificial Intelligence',5100,4,'Introduces the fundamental problems, theories, and algorithms of the artificial intelligence field. Topics include heuristic search and game trees, knowledge representation using predicate calculus, automated deduction and its applications, problem solving and planning, and introduction to machine learning. Required course work includes the creation of working programs that solve problems, reason logically, and/or improve their own performance using techniques presented in the course.'),
	(53,1,'Database Management Systems',5200,4,'Introduces relational database management systems as a class of software systems. Prepares students to be sophisticated users of database management systems. Covers design theory, query language, and performance/tuning issues. Topics include relational algebra, SQL, stored procedures, user-defined functions, cursors, embedded SQL programs, client-server interfaces, entity-relationship diagrams, normalization, B-trees, concurrency, transactions, database security, constraints, object-relational DBMSs, and sp'),
	(54,1,'Computer Graphics',5300,4,'Introduces the fundamentals of two-dimensional and three-dimensional computer graphics, with an emphasis on approaches for obtaining realistic images. Covers two-dimensional algorithms for drawing lines and curves, anti-aliasing, filling, and clipping. Studies rendering of three-dimensional scenes composed of spheres, polygons, quadric surfaces, and bi-cubic surfaces using ray-tracing and radiosity. Includes techniques for adding texture to surfaces using texture and bump maps, noise, and turbulence.'),
	(55,1,'Digital Image Processing',5320,4,'Studies the fundamental concepts of digital image processing including digitization and display of images, manipulation of images to enhance or restore image detail, encoding (compression) of images, detection of edges and other object features in images, and the formation of computed tomography (CT) images. Introduces mathematical tools such as linear systems theory and Fourier analysis and uses them to motivate and explain these image processing techniques. '),
	(56,1,'Pattern Recognition and Computer Vision',5330,4,'Introduces fundamental techniques for low-level and high-level computer vision. Examines image formation, early processing, boundary detection, image segmentation, texture analysis, shape from shading, photometric stereo, motion analysis via optic flow, object modeling, shape description, and object recognition (classification). Discusses models of human vision (gestalt effects, texture perception, subjective contours, visual illusions, apparent motion, mental rotations, and cyclopean vision).'),
	(57,1,'Robotic Science and Systems',5335,4,'Introduces autonomous mobile robots with a focus on algorithms and software development, including closed-loop control, robot software architecture, wheeled locomotion and navigation, tactile and basic visual sensing, obstacle detection and avoidance, and grasping and manipulation of objects. Offers students an opportunity to progressively construct mobile robots from a predesigned electromechanical kit. The robots are controlled wirelessly by software of the students? own design, built within a provided ro'),
	(58,1,'Lab for CS 5335',5336,0,'Offers a lab section to accompany CS 5335.'),
	(59,1,'Computer/Human Interaction',5340,4,'Covers the principles of human-computer interaction and the design and evaluation of user interfaces. Topics include an overview of human information processing subsystems (perception, memory, attention, and problem solving); how the properties of these systems affect the design of user interfaces; the principles, guidelines, and specification languages for designing good user interfaces, with emphasis on tool kits and libraries of standard graphical user interface objects; and a variety of interface evalua'),
	(60,1,'Applied Geometric Representation and Computation',5350,4,'Surveys practical techniques for representing geometric objects in two and three dimensions, for computing their motions and interactions, and for human interfaces to manipulate them. These techniques are useful not only in graphics but also in robotics, computer vision, game design, geographic information systems, computer-aided design and manufacturing, spatial reasoning and planning, physical simulation, biomechanics, and the implementation of many types of human-computer interface. '),
	(61,1,'Principles of Programming Language',5400,4,'Studies the basic components of programming languages, specification of syntax and semantics, and description and implementation of programming language features. Discusses examples from a variety of languages.'),
	(62,1,'Managing Software Development ',5500,4,'Covers software life cycle models (waterfall, spiral, and so forth), domain engineering methods, requirements analysis methods (including formal specifications), software design principles and methods, verification and testing methods, resource and schedule estimation for individual software engineers, component-based software development methods and architecture, and languages for describing software processes. Includes a project where some of the software engineering methods (from domain modeling to testi'),
	(63,1,'Mobile Application Development',5520,4,'Focuses on mobile application development on a mobile phone or related platform. Discusses memory management; user interface building, including both MVC principles and specific tools; touch events; data handling, including core data, SQL, XML, and JSON; network techniques and URL loading; and, finally, specifics such as GPS and motion sensing that may be dependent on the particular mobile platform. Students are expected to work on a project that produces a professional-quality mobile application and to dem'),
	(64,1,'Computer Systems ',5600,4,'Studies the structure, components, design, implementation, and internal operation of computer systems, focusing mainly on the operating system level. Reviews computer hardware and architecture including the arithmetic and logic unit, and the control unit. Covers current operating system components and construction techniques including the memory and memory controller, I/O device management, device drivers, memory management, file system structures, and the user interface. Introduces distributed operating sy'),
	(65,1,'Web Development',5610,4,'Discusses Web development for sites that are dynamic, data driven, and interactive. Focuses on the software development issues of integrating multiple languages, assorted data technologies, and Web interaction. Considers ASP.NET, C#, HTTP, HTML, CSS, XML, XSLT, JavaScript, AJAX, RSS/Atom, SQL, and Web services. Each student must deploy individually designed Web experiments that illustrate the Web technologies and at least one major integrative Web site project. Students may work in teams with the permission'),
	(66,1,'Computer Architecture',5620,4,'Studies the design of digital computer system components including the CPU, the memory subsystem, and interconnection busses and networks. Explores modern design techniques for increasing computer system capacity. Emphasizes the growing gap between CPU and RAM speed, and the parallel operation of the growing number of functional units in a CPU. Topics include pipelining, cache, new CPU architecture models, memory bandwidth and latency, multiprocessing and parallel processing architectures, cache coherence, '),
	(67,1,'High Performance Computing',5650,4,'Introduces students to research in the domain of high performance computing. Each instance of this course covers a single topic with broad open questions. The required systems background needed to investigate these questions is covered in the first part of the course. Then, working in teams, students have an opportunity to address different aspects of the open questions so that in combination the entire class may learn more than any single team could accomplish. Example topics include use of new hardware su'),
	(68,1,'Fundamentals of Computer Networking',5700,4,'Studies network protocols, focusing on modeling and analysis, and architectures. Introduces modeling concepts, emphasizing queuing theory, including Little?s theorem, M/M/1, M/M/m, M/D/1, and M/G/1 queuing systems. Discusses performance evaluation of computer networks including performance metrics, evaluation tools and methodology, simulation techniques, and limitations. Presents the different harmonizing functions needed for communication and efficient operation of computer networks and discusses examples '),
	(69,1,'Social Computing',5750,4,'Offers a detailed look at popular social information systems. Studies models (both computational and sociological) of social information systems and the application of them both in theory and by analyzing real data from social network interactions. The recent popularity of online social media underlies a shift in the way people connect, communicate, and share content. When designing social computing systems, one must now understand and carefully consider the structure and use of the underlying social networ'),
	(70,1,'Software Vulnerabilities and Security',5770,4,'Seeks to help students to become aware of systems security issues and to gain a basic understanding of security. Presents the principal software and applications used in the Internet, discussing in detail the related vulnerabilities and how they are exploited. Also discusses programming vulnerabilities and how they are exploited. Examines protection and detection techniques. Includes a number of practical lab assignments as well as a discussion of current research in the field.'),
	(71,1,'Algorithms',5800,4,'Presents the mathematical techniques used for the design and analysis of computer algorithms. Focuses on algorithmic design paradigms and techniques for analyzing the correctness, time, and space complexity of algorithms. Topics may include asymptotic notation, recurrences, loop invariants, Hoare triples, sorting and searching, advanced data structures, lower bounds, hashing, greedy algorithms, dynamic programming, graph algorithms, and NP-completeness.'),
	(72,1,'Knowledge Based Systems',6110,4,'Focuses on the acquisition, organization, and use of world knowledge in computers, and the challenge of creating programs with common sense. Topics include knowledge representation and reasoning models beyond predicate calculus, Bayesian inference and other models of reasoning and decision making under uncertainty, rule-based expert systems, case-based and analogical reasoning, and introduction to natural language processing. Course work includes the creation of working programs that store and manipulate wo'),
	(73,1,'Natural Language Processing',6120,4,'Provides an introduction to the computational modeling of human language, the ongoing effort to create computer programs that can communicate with people in natural language, and current applications of the natural language field, such as automated document classification, intelligent query processing, and information extraction. Topics include computational models of grammar and automatic parsing, statistical language models and the analysis of large text corpuses, natural language semantics and programs t'),
	(74,1,'Machine Learning',6140,4,'Provides a broad look at a variety of techniques used in machine learning and data mining, and also examines issues associated with their use. Topics include algorithms for supervised learning including decision tree induction, artificial neural networks, instance-based learning, probabilistic methods, and support vector machines; unsupervised learning; and reinforcement learning. Also covers computational learning theory and other methods for analyzing and measuring the performanceof learning algorithms. C'),
	(75,1,'Information Retrieval',6200,4,'Provides an introduction to information retrieval systems and different approaches to information retrieval. Topics covered include evaluation of information retrieval systems; retrieval, language, and indexing models; file organization; compression; relevance feedback; clustering; distributed retrieval and metasearch; probabilistic approaches to information retrieval; Web retrieval; filtering, collaborative filtering, and recommendation systems; cross-language IR; multimedia IR; and machine learning for in'),
	(76,1,'Data Mining Techniques',6220,4,'Covers various aspects of data mining, including classification, prediction, ensemble methods, association rules, sequence mining, and cluster analysis. The class project involves hands-on practice of mining useful knowledge from a large data set.'),
	(77,1,'Parallel Data Processing in MapReduce',6240,4,'Introduces the MapReduce programming model and the core technologies it relies on in practice, such as a distributed file system and the distributed consensus protocol. Also discusses related approaches and technologies from distributed databases and cloud computing. Emphasizes practical examples and hands-on programming experiences. Examines both plain MapReduce and database-inspired advanced programming models running on top of a MapReduce infrastructure. '),
	(78,1,'Computational Imaging',6310,4,'Introduces the latest computational methods in digital imaging that overcome the traditional limitations of a camera and enable novel imaging applications. Provides a practical guide to topics in image capture and manipulation methods for generating compelling pictures for computer graphics and for extracting scene properties for computer vision, with several examples. '),
	(79,1,'Empirical Research Methods',6350,4,'Presents an overview of methods for conducting empirical research within computer science. These methods help provide objective answers to questions about the usability, effectiveness, and acceptability of systems. The course covers the basics of the scientific method, building from a survey of objective measures to the fundamentals of hypothesis testing using relatively simple research designs, and on to more advanced research designs and statistical methods. The course also includes a significant amount o'),
	(80,1,'Compilers',6410,4,'Expects each student to write a small compiler. Topics include parser generation, abstract syntax trees, symbol tables, type checking, generation of intermediate code, simple code improvement, register allocation, run-time structures, and code generation. '),
	(81,1,'Semantics of Programming Language',6412,4,'Studies mathematical models for the behavior of programming languages. Topics include operational, denotational, and equational specifications; Lambda-calculi and their properties; applications of these techniques, such as rapid prototyping and correctness of program optimizations.'),
	(82,1,'Advanced Software Development',6510,4,'Presents current ideas and techniques in software methodology and provides a means for students to apply these techniques. Students are expected to design, implement, test, and document a software project.'),
	(83,1,'Software Development ',6515,4,'Covers proven techniques for constructing maintainable software. Includes problem and data analysis, data definitions, concise specifications, interfaces, example and test data design, program design based on data definitions, and testing. Offers students an opportunity to practice what they learn and learn from what they practice through an evolving semester-long project in the programming language of their choice. '),
	(84,1,'Methods of Software Development ',6520,4,'Studies concepts of object-oriented programming that form the basis for components (generic programming, programming by contracts, or programming with metaclasses), software architecture for supporting components (implicit invocation, filters, or reflection), and the concrete realizations of components in some industrial standards (JavaBeans, EJB, CORBA, or COM/DCOM). Also covers selected topics in component research. Students complete a project where some creation, deployment, and evolution methods of soft'),
	(85,1,'Analysis of Software Artifacts',6530,4,'Addresses all kinds of software artifacts?specifications, designs, code, and so on?and covers both traditional analyses, such as verification and testing, and promising new approaches, such as model checking, abstract execution, and new type systems. Focuses on the analysis of function (for finding errors in artifacts and to support maintenance and reverse engineering), but the course also address other kinds of analysis (such as performance and security). '),
	(86,1,'Engineering Reliable Software',6535,4,'Continues the exploration of several themes from CS 5010: unit testing, random testing, and logical reasoning about software. Specifically revisits the idea of systematic design and its connection to making logical claims about the workings of programs. After an introduction to the ACL2 programming language and theorem prover, offers students an opportunity to redesign interactive games (e.g., ?Space Invaders?) and work on turning them into reliable projects.'),
	(87,1,'Foundations of Formal Methods and Software Analysis',6540,4,'Covers necessary mathematical background such as first-order logic, and some measure theory. Studies the formal methods in more depth and breadth. Discusses the current state of the art in verification and semantics of probabilistic, real-time, and hybrid systems.'),
	(88,1,'Parallel Computing',6610,4,'Studies the principles of parallel processing, a variety of parallel computer architecture models including SIMD, MIMD, dataflow, systolic arrays, and network of workstations, and algorithms for parallel computation on the various models. Topics include interconnection network design, memory organization, cache and bus design, processor technologies, algorithms for sorting, combinatorial, and numerical problems, graph algorithms, matrix multiplication, and FFT, and the mapping of these algorithms to differe'),
	(89,1,'Wireless Network',6710,4,'Covers both theoretical issues related to wireless networking and practical systems for both wireless data networks and cellular wireless telecommunication systems. Topics include fundamentals of radio communications, channel multiple access schemes, wireless local area networks, routing in multihop ad hoc wireless networks, mobile IP, and TCP improvements for wireless links, cellular telecommunication systems, and quality of service in the context of wireless networks. Requires a project that addresses som'),
	(90,1,'Network Security',6740,4,'Studies the theory and practice of computer security, focusing on the security aspects of multiuser systems and the Internet. Introduces cryptographic tools, such as encryption, key exchange, hashing, and digital signatures in terms of their applicability to maintaining network security. Discusses security protocols for mobile networks. Topics include firewalls, viruses, Trojan horses, password security, biometrics, VPNs, and Internet protocols such as SSL, IPSec, PGP, SNMP, and others. '),
	(91,1,'Cryptography and Communications Security',6750,4,'Studies the design and use of cryptographic systems for communications and other applications such as e-commerce. Discusses the history of cryptographic systems, the mathematical theory behind the design, their vulnerability, and the different cryptanalytic attacks. Topics include stream ciphers including shift register sequences; block ciphers, such as DES and AES; public-key systems including RSA, discrete logarithms; signature schemes; hash functions, such as MD5 and SHA1; and protocol schemes including '),
	(92,1,'Secure Wireless Ad-hoc Robots on Mission (SWARM) 1',6754,4,'Exposes students to the concepts underlying the design of robust and secure heterogeneous wireless networking of mobile robots: internetworking, security, wireless communication, embedded development, and mobile phone platforms. Students in this project-oriented course form mixed teams with the goal of designing and building rescue-mission-oriented heterogeneous wireless systems operating in adversarial environments. These systems consist of off-the-shelf robots enhanced by the students with a low-power con'),
	(93,1,'Secure Wireless Ad-hoc Robots on Mission (SWARM) 2',6756,4,'Continues CS 6754. Based on the experiences in CS 6754, student teams have an opportunity to build more autonomous systems that can navigate areas where wireless communication or direct visibility are not possible. The systems must be resilient to more sophisticated denial-of-service attacks and need to more carefully account for energy consumption expended on mobility, communication, and meeting the mission task. Graduate students are expected to make a research contribution. '),
	(94,1,'Privacy, Security, and Usability',6760,4,'Challenges conventional wisdom and encourages students to discover ways that security, privacy, and usability can be made synergistic in system design. Usability and security are widely seen as two antagonistic design goals for complex computer systems. Topics include computer forensics, network forensics, user interface design, backups, logging, economic factors affecting adoption of security technology, trust management, and related public policy. Uses case studies such as PGP, S/MIME, and SSL. Introduces'),
	(95,1,'Application of Information Theory',6800,4,'Introduces information theory and its applications to various computational disciplines. Covers the basic concepts of information theory, including entropy, relative entropy, mutual information, and the asymptotic equipartition property. Concentrates on applications of information theory to computer science and other computational disciplines, including compression, coding, Markov chains, machine learning, information retrieval, statistics, computational linguistics, computational biology, wired and wireles'),
	(96,1,'Distributed Algorithms',6810,4,'Covers the design and analysis of algorithms and problems arising in distributed systems, with emphasis on network algorithms. The main concerns are efficiency of computation and communication, fault tolerance, and asynchrony. Topics include leader election, graph algorithms, datalink protocols, packet routing, logical synchronization and clock synchronization, resource allocation, self-stabilization of network protocols, and graph partitions.');

/*!40000 ALTER TABLE `pm_course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_dept
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_dept`;

CREATE TABLE `pm_dept` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(16) NOT NULL,
  `schoolId` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_dept` WRITE;
/*!40000 ALTER TABLE `pm_dept` DISABLE KEYS */;

INSERT INTO `pm_dept` (`id`, `code`, `schoolId`)
VALUES
	(1,'CS',1);

/*!40000 ALTER TABLE `pm_dept` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_major
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_major`;

CREATE TABLE `pm_major` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deptId` bigint(20) NOT NULL,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_major` WRITE;
/*!40000 ALTER TABLE `pm_major` DISABLE KEYS */;

INSERT INTO `pm_major` (`id`, `deptId`, `title`)
VALUES
	(1,1,'CS');

/*!40000 ALTER TABLE `pm_major` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_prereq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_prereq`;

CREATE TABLE `pm_prereq` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `courseId` bigint(11) NOT NULL,
  `prereqId` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_prereq` WRITE;
/*!40000 ALTER TABLE `pm_prereq` DISABLE KEYS */;

INSERT INTO `pm_prereq` (`id`, `courseId`, `prereqId`)
VALUES
	(1,11,9),
	(2,13,11),
	(3,14,7),
	(4,14,9),
	(5,18,5),
	(6,18,11),
	(7,19,11),
	(8,20,11),
	(9,20,5),
	(10,21,19),
	(11,21,20),
	(12,22,21),
	(13,23,13),
	(14,23,20),
	(15,26,14),
	(16,26,19),
	(17,27,18),
	(18,27,53),
	(19,28,23),
	(20,28,44),
	(21,29,5),
	(22,29,11),
	(23,29,19),
	(24,30,19),
	(25,30,24),
	(26,31,30),
	(27,31,61),
	(28,32,19),
	(29,33,19),
	(30,34,19),
	(31,35,19),
	(32,36,19),
	(33,36,23),
	(34,37,19),
	(35,39,23),
	(36,40,23),
	(37,41,23),
	(38,42,23),
	(39,42,64),
	(40,43,42),
	(41,44,19),
	(42,46,19),
	(43,46,24);

/*!40000 ALTER TABLE `pm_prereq` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_school
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_school`;

CREATE TABLE `pm_school` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_school` WRITE;
/*!40000 ALTER TABLE `pm_school` DISABLE KEYS */;

INSERT INTO `pm_school` (`id`, `title`)
VALUES
	(1,'Northeastern University');

/*!40000 ALTER TABLE `pm_school` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_semester
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_semester`;

CREATE TABLE `pm_semester` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schoolId` bigint(20) NOT NULL,
  `title` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_semester` WRITE;
/*!40000 ALTER TABLE `pm_semester` DISABLE KEYS */;

INSERT INTO `pm_semester` (`id`, `schoolId`, `title`)
VALUES
	(1,1,'Spring'),
	(2,1,'Summer I'),
	(3,1,'Summer II'),
	(4,1,'Fall');

/*!40000 ALTER TABLE `pm_semester` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_user`;

CREATE TABLE `pm_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `schoolId` bigint(20) NOT NULL,
  `deptId` bigint(20) NOT NULL,
  `majorId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_user` WRITE;
/*!40000 ALTER TABLE `pm_user` DISABLE KEYS */;

INSERT INTO `pm_user` (`id`, `firstName`, `email`, `password`, `schoolId`, `deptId`, `majorId`)
VALUES
	(2,'Brian','kracoff.b@husky.neu.edu','1234',1,1,1),
	(4,'Katie','soldau.k@husky.neu.edu','hci',1,1,1),
	(5,'Catherine','patchell.c@husky.neu.edu','compsciordie',1,1,1),
	(9,'Josh','caron.jo@husky.neu.edu','turtle',1,1,1);

/*!40000 ALTER TABLE `pm_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_user_course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_user_course`;

CREATE TABLE `pm_user_course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `courseId` bigint(20) NOT NULL,
  `semesterId` bigint(20) NOT NULL DEFAULT '0',
  `userId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_user_course` WRITE;
/*!40000 ALTER TABLE `pm_user_course` DISABLE KEYS */;

INSERT INTO `pm_user_course` (`id`, `courseId`, `semesterId`, `userId`)
VALUES
	(22,29,9,4),
	(23,81,11,4),
	(24,59,11,4),
	(25,9,10,9),
	(27,10,10,9),
	(28,7,10,9),
	(29,11,13,9),
	(31,12,13,9),
	(33,19,14,9),
	(34,14,15,5),
	(35,15,14,9),
	(36,14,14,9),
	(37,32,18,9),
	(38,18,18,9),
	(39,12,15,5),
	(40,13,18,9),
	(41,11,19,5),
	(45,9,29,2),
	(46,11,29,2),
	(47,2,30,2),
	(49,1,30,2),
	(50,19,30,2);

/*!40000 ALTER TABLE `pm_user_course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pm_user_semester
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pm_user_semester`;

CREATE TABLE `pm_user_semester` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `semesterId` bigint(20) NOT NULL,
  `year` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pm_user_semester` WRITE;
/*!40000 ALTER TABLE `pm_user_semester` DISABLE KEYS */;

INSERT INTO `pm_user_semester` (`id`, `userId`, `semesterId`, `year`)
VALUES
	(9,4,1,2008),
	(10,9,1,2012),
	(11,4,4,2013),
	(12,4,3,2005),
	(13,9,2,2012),
	(14,9,4,2012),
	(15,5,1,2012),
	(16,5,2,2011),
	(17,5,4,2013),
	(18,9,1,2013),
	(19,5,1,2013),
	(29,2,4,2010),
	(30,2,1,2011);

/*!40000 ALTER TABLE `pm_user_semester` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
