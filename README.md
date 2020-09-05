# HSEF

Web App for Hoosier Science and Engineering State Fair

## Git process

> **No pushing to master!**

**Development Process**

* Pickup a ticket (Move it to In Progress)
* Create a feature or bug branch
* Make changes
* **Create a PR as soon as possible**, mark it as a Work In Progress (WIP) if you need to
  > * Point PR at `dev` branch, **not master**
  > * Do not review PR's marked as WIP
* Address any comments or requests for changes in your PR
* Merge to `dev` once you have needed approvals

**Branching pattern:**

Features

``` text
master <- dev <- feature_work
```

Patches/BugFixes

```text
- master <- dev <- patches/bug-fixes
```

**Branching Naming Convention:**

\<username>-<ticket #>-[brief title]

eg: djpeach-24-judgeRegistrationPage

title can be optional, but makes organization easier

**PR Process:**

Push branch, PR to `dev`, get at least 1 approval.

## Local Server Development

To develop the server locally, you will need PHP >= 5.4, Composer, and Slim.

- Install PHP however you want.
- Install Composer here: https://getcomposer.org/
- Install Slim with composer via: `php composer.phar require slim/slim "~2.0"`

Now to run the app: navigate to the root directory and run:

```bash
php -S locahost:8080
```

> Note that you do not need to do this on corsair as it is already a running server.

Test it worked with Postman or your browser at http://localhost:8080/ping.

You should see "pong"

## Local App Development

// WIP
