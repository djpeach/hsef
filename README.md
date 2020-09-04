# hsef

Web App for Hoosier Science and Engineering State Fair

# Git process

### **No pushing to master**

**Branch pattern:**

master <- dev <- feature_work

Feature Work branch naming convention:

\<username>-<ticket #>-[brief title]

eg: djpeach-24-judgeRegistrationPage

**PR Process:**

Push branch, PR to dev, get at least 1 approval.

# Local Development

To develop the server locally, you will need PHP >= 5.4, Composer, and Slim.

- Install PHP however you want.
- Install Composer here: https://getcomposer.org/
- Install Slim with composer via:

  ```bash
  php composer.phar require slim/slim "~2.0"
  ```

Now to run the app, navigate to the directory with `index.php` and run:

```bash
php -S locahost:8080
```

Test it worked with Postman or your browser at http://localhost:8080/.

You should see "Hello World!"
