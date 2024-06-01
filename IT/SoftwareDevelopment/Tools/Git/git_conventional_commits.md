# Git Conventional Commits

<br>
<br>

## Table Of Contents

- [Git Conventional Commits](#git-conventional-commits)
  - [Table Of Contents](#table-of-contents)
  - [General](#general)
  - [Types](#types)
  - [Scope](#scope)
  - [Description](#description)
  - [Body](#body)
  - [Footers](#footers)

<br>
<br>
<br>

## General

Conventional commits are conventions for Git commit messages.

```
<type>(?<scope>): <description>

?<body>

?<footers>
```

<br>
<br>
<br>

## Types

> The **type** communicates the general intent of the commit.

<br>
<br>

| Type     | Description                  |
| :------- | :--------------------------- |
| feat     | new feature                  |
| fix      | bugfix                       |
| test     | tests (unit, e2e, ...)       |
| refactor | refactor                     |
| docs     | documentation                |
| build    | build system                 |
| ci       | CI configuration             |
| style    | style (code formatting, css) |
| perf     | performance improvement      |
| revert   | revert to previous commit    |

<br>
<br>
<br>

## Scope

> The optional **scope** provides additional context information to the commit type.

<br>
<br>

Example:

```
feat(lang): add spanish localization
```

<br>
<br>
<br>

## Description

> The **description** is a general summary about the commit.

<br>
<br>
<br>

## Body

> The optional **body** is describing the commit in detail

<br>
<br>
<br>

## Footers

> The optional **footers** can either indicate that the commit introduces a `BREAKING CHANGE` or reference a ticket number
