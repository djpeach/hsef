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

## Generate API Docs:

In the api directory, run: `apidoc -i routers -o docs`

## Build Vue app:

In the client directory, run: `npm run build`