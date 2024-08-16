
# Security Audit Web Application

This project is a web-based questionnaire designed to facilitate security audits for companies. It was created as an example for a friend to demonstrate how a security audit reporting system can be implemented. The application includes features like user authentication, a questionnaire system, and statistical reporting.

## About the Project

The Security Audit Web Application was developed to streamline the process of conducting security audits by providing a convenient web interface. Instead of manually handling and documenting audit questions, this application allows auditors to conduct surveys online and generate reports efficiently. The system ensures that all responses are securely stored and easily accessible for future reference.

## Features

- **User Authentication:** A secure login system to ensure that only authorized personnel can access the audit platform.
- **Questionnaire System:** A comprehensive set of audit questions tailored for assessing the security posture of a company.
- **Statistical Reporting:** Automatic generation of statistics based on the questionnaire responses, providing insights into the overall security status.

## Installation

To set up the Security Audit Web Application on your server, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/andriivmnd/auditor-php.git
   ```
2. **Navigate to the project directory**:
   ```bash
   cd auditor-php
   ```
3. **Set up the database**:
   - Import the SQL file provided in the `database` folder into your MySQL database.
   - Update the `config.php` file with your database credentials:
     ```php
     // config.php
     define('DB_HOST', 'your_db_host');
     define('DB_USER', 'your_db_user');
     define('DB_PASS', 'your_db_password');
     define('DB_NAME', 'your_db_name');
     ```

4. **Configure the web server**:
   - Ensure that your web server (e.g., Apache or Nginx) is configured to serve PHP files.
   - Point the document root to the `public` directory of the project.

5. **Run the application**:
   - Open your web browser and navigate to the domain or IP address where the application is hosted.

## Usage

1. **Login**: 
   - Access the login page and enter your credentials to authenticate.
   
2. **Conduct an Audit**: 
   - Once logged in, navigate to the questionnaire section.
   - Answer all the audit questions for the company you are assessing.

3. **View Reports**: 
   - After completing the questionnaire, generate statistical reports to review the security status.
   - Reports can be exported or saved for documentation purposes.

## Notes

- **Security**: Ensure that your web server is configured securely and that sensitive data (e.g., passwords) is handled appropriately.
- **Customization**: The questionnaire can be customized to fit the specific needs of different audits. Modify the questions in the database or through the admin interface if available.
- **Backup**: Regularly back up your database to prevent data loss.

## Future Improvements

- **Enhanced Reporting**: Additional charts and graphs to provide more detailed analysis of audit results.
- **Multilingual Support**: Allow the application to support multiple languages for broader usability.
- **Role-Based Access Control**: Implement different user roles (e.g., admin, auditor) with varying permissions.

## Conclusion

This web application is a practical tool for conducting security audits efficiently and systematically. Whether for internal assessments or for third-party audits, this system provides a structured approach to evaluating and reporting on security measures. If you have any feedback or require further customization, feel free to reach out.
