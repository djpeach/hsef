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

Now to run the server: navigate to the root directory and run:

```bash
php -S locahost:9000
```

> Note that you do not need to do this on corsair as it is already a running server.

Test it worked with Postman or your browser at http://localhost:9000/ping.

You should see "pong"

## Local Client Development

To develop the client locally, you will need node and npm.

- Install Node.js however you want.
- `cd` to `/client`
- run `npm i`

Now to run the client app run:

```bash
npm run serve
```

Now the app should be running in a development server. To build and serve the app with php:

- run `npm run build`
- run the server
- go to the root of the server.
  > It will serve up the built client app from it's `/dist` folder.

## Deployment

- ssh into your apache server.
- verify PHP version >= 5.3
- install composer for php
- navigate into `htdocs/` and clone project with `git clone https://github.com/djpeach/hsef.git .`
- navigate into api and run `composer install`
- navigate into client and run `npm install`
- in client also run `npm run build`
- check your corsair link to verify deployment worked