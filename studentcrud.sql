-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2022 at 12:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites. It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Server.', '1662314671.png', 0, 2, '2022-09-04 16:04:31', '2022-09-04 16:04:31'),
(2, 'Python', 'Python is a computer programming language often used to build websites and software, automate tasks, and conduct data analysis. Python is a general-purpose language, meaning it can be used to create a variety of different programs and isn\'t specialized for any specific problems.', '1662316066.jpeg', 0, 2, '2022-09-04 16:27:46', '2022-09-04 16:27:46'),
(3, 'JavaScript', 'What is JavaScript? JavaScript (often shortened to JS) is a lightweight, interpreted, object-oriented language with first-class functions, and is best known as the scripting language for Web pages, but it\'s used in many non-browser environments as well.prije 3 dana', '1662316402.png', 0, 2, '2022-09-04 16:33:22', '2022-09-04 16:33:22'),
(4, 'C++', 'C++ is one of the world\'s most popular programming languages. C++ can be found in today\'s operating systems, Graphical User Interfaces, and embedded systems. C++ is an object-oriented programming language which gives a clear structure to programs and allows code to be reused, lowering development costs.', '1662316871.png', 0, 2, '2022-09-04 16:41:11', '2022-09-04 16:41:11'),
(5, 'Java', 'Java is an object-oriented programming language that produces software for multiple platforms. When a programmer writes a Java application, the compiled code (known as bytecode) runs on most operating systems (OS), including Windows, Linux and Mac OS.', '1662317284.jpg', 0, 2, '2022-09-04 16:48:04', '2022-09-04 16:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_02_162800_add_role_as_to_users_table', 2),
(6, '2022_09_02_170810_create_courses_table', 3),
(7, '2022_09_02_221314_create_tests_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$dMx4glbL4lAapWOGMf/Ifeu6hZ3VuQtSU2SWX9Xh3hhYhAlg5Og/O', '2022-09-04 17:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `courses_id`, `title`, `description`, `image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is PEAR in PHP', 'PEAR is a framework and repository for reusable PHP components. PEAR stands for PHP Extension and Application Repository. It contains all types of PHP code snippets and libraries. It also provides a command line interface to install “packages” automatically.', '1662314734.png', 0, 2, '2022-09-04 16:05:34', '2022-09-04 16:08:16'),
(2, 1, 'What is the difference between static and dynamic websites', 'Static Websites	Dynamic Websites\r\nIn static websites, content can’t be changed after running the script. You cannot change anything in the site as it is predefined.	\r\n\r\nIn dynamic websites, content of script can be changed at the run time. Its content is regenerated every time a user visits or reloads.', '1662314977.png', 0, 2, '2022-09-04 16:09:37', '2022-09-04 16:09:37'),
(3, 1, 'How to execute a PHP script from the command line', 'To execute a PHP script, use the PHP Command Line Interface (CLI) and specify the file name of the script in the following way:\r\n\r\n1\r\nphp script.php', '1662315010.png', 0, 2, '2022-09-04 16:10:10', '2022-09-04 16:10:10'),
(4, 1, 'Is PHP a case sensitive language', 'PHP is partially case sensitive. The variable names are case-sensitive but function names are not. If you define the function name in lowercase and call them in uppercase, it will still work. User-defined functions are not case sensitive but the rest of the language is case-sensitive.', '1662315063.png', 0, 2, '2022-09-04 16:11:03', '2022-09-04 16:11:03'),
(5, 1, 'What is the meaning of ‘escaping to PHP', 'The PHP parsing engine needs a way to differentiate PHP code from other elements in the page. The mechanism for doing so is known as ‘escaping to PHP’. Escaping a string means to reduce ambiguity in quotes used in that string.', '1662315093.png', 0, 2, '2022-09-04 16:11:33', '2022-09-04 16:11:33'),
(6, 1, 'What are the characteristics of PHP variables', 'Some of the important characteristics of PHP variables include:\r\n\r\nAll variables in PHP are denoted with a leading dollar sign ($).\r\nThe value of a variable is the value of its most recent assignment.\r\nVariables are assigned with the = operator, with the variable on the left-hand side and the expression to be evaluated on the right.\r\nVariables can, but do not need, to be declared before assignment.\r\nVariables in PHP do not have intrinsic types – a variable does not know in advance whether it will be used to store a number or a string of characters.\r\nVariables used before they are assigned have default values.', '1662315122.png', 0, 2, '2022-09-04 16:12:02', '2022-09-04 16:12:02'),
(7, 1, 'What are the different types of PHP variables', 'There are 8 data types in PHP which are used to construct the variables:\r\n\r\nIntegers − are whole numbers, without a decimal point, like 4195.\r\nDoubles − are floating-point numbers, like 3.14159 or 49.1.\r\nBooleans − have only two possible values either true or false.\r\nNULL − is a special type that only has one value: NULL.\r\nStrings − are sequences of characters, like ‘PHP supports string operations.’\r\nArrays − are named and indexed collections of other values.\r\nObjects − are instances of programmer-defined classes, which can package up both other kinds of values and functions that are specific to the class.\r\nResources − are special variables that hold references to resources external to PHP.', '1662315159.png', 0, 2, '2022-09-04 16:12:27', '2022-09-04 16:12:39'),
(8, 1, 'What are the rules for naming a PHP variable', 'The following rules are needed to be followed while  naming a PHP variable:\r\n\r\nVariable names must begin with a letter or underscore character.\r\nA variable name can consist of numbers, letters, underscores but you cannot use characters like + , – , % , ( , ) . & , etc.', '1662315822.png', 0, 2, '2022-09-04 16:23:42', '2022-09-04 16:23:42'),
(9, 1, 'What are the rules to determine the “truth” of any value which is not already of the Boolean type', 'The rules to determine the “truth” of any value which is not already of the Boolean type are:\r\n\r\nIf the value is a number, it is false if exactly equal to zero and true otherwise.\r\nIf the value is a string, it is false if the string is empty (has zero characters) or is the string “0”, and is true otherwise.\r\nValues of type NULL are always false.\r\nIf the value is an array, it is false if it contains no other values, and it is true otherwise. For an object, containing a value means having a member variable that has been assigned a value.\r\nValid resources are true (although some functions that return resources when they are successful will return FALSE when unsuccessful).\r\nDon’t use double as Booleans.', '1662315858.png', 0, 2, '2022-09-04 16:24:18', '2022-09-04 16:24:18'),
(10, 1, 'What is NULL', 'NULL is a special data type which can have only one value. A variable of data type NULL is a variable that has no value assigned to it. It can be assigned as follows:\r\n\r\n\r\n1\r\n$var = NULL;', '1662315879.png', 0, 2, '2022-09-04 16:24:39', '2022-09-04 16:24:39'),
(11, 2, 'What is the difference between list and tuples in Python', 'LIST	TUPLES\r\nLists are mutable i.e they can be edited.	Tuples are immutable (tuples are lists which can’t be edited).\r\nLists are slower than tuples.	Tuples are faster than list.\r\nSyntax: list_1 = [10, ‘Chelsea’, 20]	Syntax: tup_1 = (10, ‘Chelsea’ , 20)', '1662316091.jpeg', 0, 2, '2022-09-04 16:28:11', '2022-09-04 16:28:11'),
(12, 2, 'What are the key features of Python', 'Python is an interpreted language. That means that, unlike languages like C and its variants, Python does not need to be compiled before it is run. Other interpreted languages include PHP and Ruby.\r\nPython is dynamically typed, this means that you don’t need to state the types of variables when you declare them or anything like that. You can do things like x=111 and then x=\"I\'m a string\" without error\r\nPython is well suited to object orientated programming in that it allows the definition of classes along with composition and inheritance. Python does not have access specifiers (like C++’s public, private).\r\nIn Python, functions are first-class objects. This means that they can be assigned to variables, returned from other functions and passed into functions. Classes are also first class objects\r\nWriting Python code is quick but running it is often slower than compiled languages. Fortunately，Python allows the inclusion of C-based extensions so bottlenecks can be optimized away and often are. The numpy package is a good example of this, it’s really quite quick because a lot of the number-crunching it does isn’t actually done by Python\r\nPython finds use in many spheres – web applications, automation, scientific modeling, big data applications and many more. It’s also often used as “glue” code to get other languages and components to play nice.', '1662316166.jpeg', 0, 2, '2022-09-04 16:29:26', '2022-09-04 16:29:26'),
(13, 2, 'What type of language is python? Programming or scripting', 'Ans: Python is capable of scripting, but in general sense, it is considered as a general-purpose programming language. To know more about Scripting, you can refer to the Python Scripting Tutorial.', '1662316181.jpeg', 0, 2, '2022-09-04 16:29:41', '2022-09-04 16:29:41'),
(14, 2, 'Python an interpreted language. Explain.', 'Ans: An interpreted language is any programming language which is not in machine-level code before runtime. Therefore, Python is an interpreted language.', '1662316197.jpeg', 0, 2, '2022-09-04 16:29:57', '2022-09-04 16:29:57'),
(15, 2, 'What is pep 8', 'Ans: PEP stands for Python Enhancement Proposal. It is a set of rules that specify how to format Python code for maximum readability.', '1662316211.jpeg', 0, 2, '2022-09-04 16:30:11', '2022-09-04 16:30:11'),
(16, 2, 'What are the benefits of using Python', 'Ans: The benefits of using python are-\r\n\r\nEasy to use– Python is a high-level programming language that is easy to use, read, write and learn.\r\nInterpreted language– Since python is interpreted language, it executes the code line by line and stops if an error occurs in any line.\r\nDynamically typed– the developer does not assign data types to variables at the time of coding. It automatically gets assigned during execution.\r\nFree and open-source– Python is free to use and distribute. It is open source.\r\nExtensive support for libraries– Python has vast libraries that contain almost any function needed. It also further provides the facility to import other packages using Python Package Manager(pip).\r\nPortable– Python programs can run on any platform without requiring any change.\r\nThe data structures used in python are user friendly.\r\nIt provides more functionality with less coding.', '1662316236.jpeg', 0, 2, '2022-09-04 16:30:36', '2022-09-04 16:30:36'),
(17, 2, 'What are Python namespaces', 'Ans: A namespace in python refers to the name which is assigned to each object in python. The objects are variables and functions. As each object is created, its name along with space(the address of the outer function in which the object is), gets created. The namespaces are maintained in python like a dictionary where the key is the namespace and value is the address of the object. There 4 types of namespace in python-\r\n\r\nBuilt-in namespace– These namespaces contain all the built-in objects in python and are available whenever python is running.\r\nGlobal namespace– These are namespaces for all the objects created at the level of the main program.\r\nEnclosing namespaces– These namespaces are at the higher level or outer function.\r\nLocal namespaces– These namespaces are at the local or inner function.', '1662316251.jpeg', 0, 2, '2022-09-04 16:30:51', '2022-09-04 16:30:51'),
(18, 2, 'What are decorators in Python', 'Ans: Decorators are used to add some design patterns to a function without changing its structure. Decorators generally are defined before the function they are enhancing. To apply a decorator we first define the decorator function. Then we write the function it is applied to and simply add the decorator function above the function it has to be applied to. For this, we use the @ symbol before the decorator.', '1662316267.jpeg', 0, 2, '2022-09-04 16:31:07', '2022-09-04 16:31:07'),
(19, 2, 'What are Dict and List comprehensions', 'Ans: Dictionary and list comprehensions are just another concise way to define dictionaries and lists.\r\n\r\nExample of list comprehension is-\r\n\r\n1\r\nx=[i for i in range(5)]\r\nThe above code creates a list as below-\r\n\r\n1\r\n2\r\n4\r\n[0,1,2,3,4]\r\nExample of dictionary comprehension is-\r\n\r\n1\r\nx=[i : i+2 for i in range(5)]\r\nThe above code creates a list as below-\r\n\r\n1\r\n[0: 2, 1: 3, 2: 4, 3: 5, 4: 6]', '1662316282.jpeg', 0, 2, '2022-09-04 16:31:22', '2022-09-04 16:31:22'),
(20, 2, 'What are the common built-in data types in Python', 'Ans: The common built-in data types in python are-\r\n\r\nNumbers– They include integers, floating-point numbers, and complex numbers. eg. 1, 7.9,3+4i\r\n\r\nList– An ordered sequence of items is called a list. The elements of a list may belong to different data types. Eg. [5,’market’,2.4]\r\n\r\nTuple– It is also an ordered sequence of elements. Unlike lists , tuples are immutable, which means they can’t be changed. Eg. (3,’tool’,1)\r\n\r\nString– A sequence of characters is called a string. They are declared within single or double-quotes. Eg. “Sana”, ‘She is going to the market’, etc.\r\n\r\nSet– Sets are a collection of unique items that are not in order. Eg. {7,6,8}\r\n\r\nDictionary– A dictionary stores values in key and value pairs where each value can be accessed through its key. The order of items is not important. Eg. {1:’apple’,2:’mango}\r\n\r\nBoolean– There are 2 boolean values- True and False.', '1662316303.jpeg', 0, 2, '2022-09-04 16:31:43', '2022-09-04 16:31:43'),
(21, 2, 'What is the difference between .py and .pyc files', 'Ans: The .py files are the python source code files. While the .pyc files contain the bytecode of the python files. .pyc files are created when the code is imported from some other source. The interpreter converts the source .py files to .pyc files which helps by saving time.', '1662316321.jpeg', 0, 2, '2022-09-04 16:32:01', '2022-09-04 16:32:01'),
(22, 3, 'What is the difference between Java & JavaScript', 'Java	JavaScript\r\nJava is an OOP programming language.	JavaScript is an OOP scripting language.\r\nIt creates applications that run in a virtual machine or browser.	The code is run on a browser only.\r\nJava code needs to be compiled.	JavaScript code are all in the form of text.', '1662316452.png', 0, 2, '2022-09-04 16:34:12', '2022-09-04 16:34:12'),
(23, 3, 'What is JavaScript', 'JavaScript is a lightweight, interpreted programming language with object-oriented capabilities that allows you to build interactivity into otherwise static HTML pages. The general-purpose core of the language has been embedded in Netscape, Internet Explorer, and other web browsers.', '1662316469.png', 0, 2, '2022-09-04 16:34:29', '2022-09-04 16:34:29'),
(24, 3, 'What are the data types supported by JavaScript', 'The data types supported by JavaScript are:\r\n\r\nUndefined\r\nNull\r\nBoolean\r\nString\r\nSymbol\r\nNumber\r\nObject', '1662316486.png', 0, 2, '2022-09-04 16:34:46', '2022-09-04 16:34:46'),
(25, 3, 'What are the features of JavaScript', 'Following are the features of JavaScript:\r\n\r\nIt is a lightweight, interpreted programming language.\r\nIt is designed for creating network-centric applications.\r\nIt is complementary to and integrated with Java.\r\nIt is an open and cross-platform scripting language.', '1662316501.png', 0, 2, '2022-09-04 16:35:01', '2022-09-04 16:35:01'),
(26, 3, 'Is JavaScript a case-sensitive language', 'Yes, JavaScript is a case sensitive language.  The language keywords, variables, function names, and any other identifiers must always be typed with a consistent capitalization of letters.', '1662316522.png', 0, 2, '2022-09-04 16:35:22', '2022-09-04 16:35:22'),
(27, 3, 'Following are the advantages of using JavaScript −', 'Less server interaction − You can validate user input before sending the page off to the server. This saves server traffic, which means less load on your server.\r\nImmediate feedback to the visitors − They don’t have to wait for a page reload to see if they have forgotten to enter something.\r\nIncreased interactivity − You can create interfaces that react when the user hovers over them with a mouse or activates them via the keyboard.\r\nRicher interfaces − You can use JavaScript to include such items as drag-and-drop components and sliders to give a Rich Interface to your site visitors.', '1662316539.png', 0, 2, '2022-09-04 16:35:39', '2022-09-04 16:35:39'),
(28, 3, 'How can you create an object in JavaScript', 'JavaScript supports Object concept very well. You can create an object using the object literal as follows −\r\n\r\n1\r\n2\r\n3\r\n4\r\nvar emp = {\r\nname: \"Daniel\",\r\nage: 23\r\n};\r\nQ8. How can you create an Array in JavaScript?\r\nYou can define arrays using the array literal as follows-\r\n\r\n\r\n1\r\n2\r\nvar x = [];\r\nvar y = [1, 2, 3, 4, 5];\r\nQ9. What is a name function in JavaScript & how to define it?\r\nA named function declares a name as soon as it is defined. It can be defined using function keyword as :\r\n\r\n1\r\n2\r\n3\r\nfunction named(){\r\n// write code here\r\n}', '1662316556.png', 0, 2, '2022-09-04 16:35:56', '2022-09-04 16:35:56'),
(29, 3, 'What is argument objects in JavaScript & how to get the type of arguments passed to a function', 'JavaScript variable arguments represents the arguments that are passed to a function. Using typeof operator, we can get the type of arguments passed to a function. For example −\r\n\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\nfunction func(x){\r\nconsole.log(typeof x, arguments.length);\r\n}\r\nfunc(); //==> \"undefined\", 0\r\nfunc(7); //==> \"number\", 1\r\nfunc(\"1\", \"2\", \"3\"); //==> \"string\", 3', '1662316580.png', 0, 2, '2022-09-04 16:36:20', '2022-09-04 16:36:20'),
(30, 3, 'What are the scopes of a variable in JavaScript', 'The scope of a variable is the region of your program in which it is defined. JavaScript variable will have only two scopes.\r\n• Global Variables − A global variable has global scope which means it is visible everywhere in your JavaScript code.', '1662316598.png', 0, 2, '2022-09-04 16:36:38', '2022-09-04 16:36:38'),
(31, 4, 'What is the difference between OOP and SOP', 'Object-Oriented Programming	Structural Programming\r\nObject-Oriented Programming is a type of programming which is based on objects rather than just functions and procedures	Provides logical structure to a program where programs are divided functions\r\nBottom-up approach	Top-down approach\r\nProvides data hiding	Does not provide data hiding\r\nCan solve problems of any complexity	Can solve moderate problems\r\nCode can be reused thereby reducing redundancy	Does not support code reusability', '1662316982.png', 0, 2, '2022-09-04 16:43:02', '2022-09-04 16:43:02'),
(32, 4, 'What is Object Oriented Programming', 'Object-Oriented Programming(OOPs) is a type of programming that is based on objects rather than just functions and procedures. Individual objects are grouped into classes. OOPs implements real-world entities like inheritance, polymorphism, hiding, etc into programming. It also allows binding data and code together.', '1662317010.png', 0, 2, '2022-09-04 16:43:30', '2022-09-04 16:43:30'),
(33, 4, 'Why use OOPs', 'OOPs allows clarity in programming thereby allowing simplicity in solving complex problems\r\nCode can be reused through inheritance thereby reducing redundancy\r\nData and code are bound together by encapsulation\r\nOOPs allows data hiding, therefore, private data is kept confidential\r\nProblems can be divided into different parts making it simple to solve\r\nThe concept of polymorphism gives flexibility to the program by allowing the entities to have multiple forms', '1662317027.png', 0, 2, '2022-09-04 16:43:47', '2022-09-04 16:43:47'),
(34, 4, 'What are the main features of OOPs', 'Inheritance\r\nEncapsulation\r\nPolymorphism\r\nData Abstraction', '1662317043.png', 0, 2, '2022-09-04 16:44:03', '2022-09-04 16:44:03'),
(35, 4, 'What is a class', 'A class is a prototype that consists of objects in different states and with different behaviors. It has a number of methods that are common the objects present within that class.', '1662317074.png', 0, 2, '2022-09-04 16:44:34', '2022-09-04 16:44:34'),
(36, 4, 'What is the difference between a class and a structure', 'Class: User-defined blueprint from which objects are created. It consists of methods or set of instructions that are to be performed on the objects.', '1662317091.png', 0, 2, '2022-09-04 16:44:51', '2022-09-04 16:44:51'),
(37, 4, 'Can you call the base class method without creating an instance', 'Yes, you can call the base class without instantiating it if:\r\n\r\nIt is a static method\r\nThe base class is inherited by some other subclass', '1662317106.png', 0, 2, '2022-09-04 16:45:06', '2022-09-04 16:45:06'),
(38, 4, 'What is data abstraction', 'Data abstraction is a very important feature of OOPs that allows displaying only the important information and hiding the implementation details. For example, while riding a bike, you know that if you raise the accelerator, the speed will increase, but you don’t know how it actually happens. This is data abstraction as the implementation details are hidden from the rider.', '1662317127.png', 0, 2, '2022-09-04 16:45:27', '2022-09-04 16:45:27'),
(39, 4, 'What is an abstract class', 'An abstract class is a class that consists of abstract methods. These methods are basically declared but not defined. If these methods are to be used in some subclass, they need to be exclusively defined in the subclass.', '1662317146.png', 0, 2, '2022-09-04 16:45:46', '2022-09-04 16:45:46'),
(40, 5, 'Which skills do developers need to code in Java', 'Applicants should know that three critical skills they need to code in Java include data-structure knowledge, algorithms-in-Java knowledge, and knowledge of APIs and libraries.', '1662317325.jpg', 0, 2, '2022-09-04 16:48:45', '2022-09-04 16:48:45'),
(41, 5, 'Which soft skills do developers need to code in Java', 'Do your applicants know that communication, critical thinking, and problem-solving skills are vital soft skills for developers? Can they provide examples of why these soft skills are important?', '1662317341.jpg', 0, 2, '2022-09-04 16:49:01', '2022-09-04 16:49:01'),
(42, 5, 'What are your favorite Java features', 'Some of the Java features that applicants may mention when responding to this interview question include:\r\n\r\nJava’s Secure feature to guarantee a virus-free system\r\nThe fact that Java is an object-oriented programming language\r\nThe fact that Java is an independent platform, and its virtual machine interprets its code', '1662317359.jpg', 0, 2, '2022-09-04 16:49:19', '2022-09-04 16:49:19'),
(43, 5, 'Explain what static loading is in Java', 'Your applicants should understand that static loading is an object-and-instance-creation process developers carry out using new keywords.', '1662317375.jpg', 0, 2, '2022-09-04 16:49:35', '2022-09-04 16:49:35'),
(44, 5, 'How would you reverse strings in Java', 'Although a reverse() utility method doesn’t exist in the string class, methods your candidates may mention when answering this interview question include:\r\n\r\nUsing a stringBuffer method\r\nUsing a recursion method\r\nUsing a for loop method', '1662317393.jpg', 0, 2, '2022-09-04 16:49:53', '2022-09-04 16:49:53'),
(45, 5, 'How would you determine whether a string’s characters are all unique', 'Two methods your applicants may outline when explaining how to determine if a string’s characters are all unique are:\r\n\r\nUsing an indexOf and lastIndexOf method\r\nUsing a HashSet method', '1662317408.jpg', 0, 2, '2022-09-04 16:50:08', '2022-09-04 16:50:08'),
(46, 5, 'Which method would you use to learn if a string is a rotation of another string', 'Applicants should mention a few steps when responding to this interview question. They may first label the two strings involved in the process (i.e., str5 and str6) and then outline the following processes:\r\n\r\nMake a new string: str7 = str5 + str5\r\nCheck whether str7 contains str6\r\nIf str7 does contain str6, str6 is a rotation of str5\r\nIf str 7 does not contain str 6, str6 is not a rotation of str5', '1662317424.jpg', 0, 2, '2022-09-04 16:50:24', '2022-09-04 16:50:24'),
(47, 5, 'Explain how you would find a string’s first non-repeated character', 'Interviewees may explain that developers can find a string’s first non-repeated character using two methods: \r\n\r\nThe linkedHashMap method\r\nThe indexOf and lastIndexOf method', '1662317440.jpg', 0, 2, '2022-09-04 16:50:40', '2022-09-04 16:50:40'),
(48, 5, 'Explain what an array is in Java', 'Can your applicants explain that arrays are container objects with a certain number of values of a specific type? Do they know that developers can determine the length of an array when they create one, because the length doesn’t change afterwards?', '1662317466.jpg', 0, 2, '2022-09-04 16:51:06', '2022-09-04 16:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_by`, `created_at`, `updated_at`, `role_as`) VALUES
(2, 'Tarik', 'tarik2000_karate@hotmail.com', '1662316665.jpg', NULL, '$2y$10$qQ71rMLGaYYnfnABN5766OU9asm8mPZ/5BNwvFO3uPDnaEd0jd5.a', NULL, 2, '2022-09-02 14:41:42', '2022-09-04 16:37:45', 1),
(6, 'Kenan', 'keno@gmail.com', NULL, NULL, '$2y$10$SC8HX00Yn/Cwzff0AG2KEevEEGOouZKtwL6cnOWih.HHyiMJvFsQG', NULL, 2, '2022-09-04 16:54:40', '2022-09-04 16:54:40', 0),
(7, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$qQ71rMLGaYYnfnABN5766OU9asm8mPZ/5BNwvFO3uPDnaEd0jd5.a', 'SV5ukpnQ6SVSzNPiSu3HBfXHZQVJHt2QCZpt1wonFUAfD6oCRZ1sBXPsj1hh', 2, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
