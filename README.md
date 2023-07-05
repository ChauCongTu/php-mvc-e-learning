## English Learning Website
This is a web application for high school students to learn English, which provides the following features:

- Basic English lessons such as vocabulary, grammar, etc.

<p align="center">
<img src="https://cdn.discordapp.com/attachments/1100753623849377835/1126071805543718972/image.png" alt="lesson demo image" width="60%">
</p>

- A forum for users to help and exchange with each other.

<p align="center">
<img src="https://cdn.discordapp.com/attachments/1100753623849377835/1126072831436935228/image.png" alt="forum demo image" width="60%">
</p>

- Practice tests for high school exams and national exams.

<p align="center">
<img src="https://cdn.discordapp.com/attachments/1100753623849377835/1126072933614375063/image.png" alt="test demo image" width="60%">
</p>

- Leaderboard for users' practice exam results.

<p align="center">
<img src="https://cdn.discordapp.com/attachments/1100753623849377835/1126073370698600488/image.png" alt="ranking demo image" width="60%">
</p>

- Integration with Google Translate's text translation API.

<p align="center">
<img src="https://cdn.discordapp.com/attachments/1100753623849377835/1126073455482253453/image.png" alt="translate tool demo image" width="60%">
</p>

## Requirements

- PHP 7+

- MySQL 5.7+

- Apache/Nginx server

## Installation

(If you need a more detailed guide in Vietnamese, please open the readme.docx file above)

### 1. Download and install Xampp

Xampp is a complete distribution of Apache, PHP, MySQL, and Perl, allowing you to run a web server on your computer. To download and install Xampp, you can refer to the guide on the official website: https://www.apachefriends.org/download.html

### 2. Clone or download the project from Github

 You can clone the project to your computer by using the following command: 
 ``` 
 git clone https://github.com/ChauCongTu/php-mvc-e-learning.git 
 ```

 Alternatively, you can download the project as a zip file and extract it into the Xampp folder.


### 3. Configure the database

- Create a new database with any name in phpMyAdmin.

- Import file `data.sql` to database

- To configure the database connection, modify the information in the `configs/database.php` file.


### 4. Run the project

- Open __Xampp__ and turn on __Apache__ and __MySQL__ services.

- Access the __`http://localhost/your-path-to-project-folder`__ address in the browser to open the website.

## Contributors

Chau Que Nhon (quenhon2002@gmail.com)

