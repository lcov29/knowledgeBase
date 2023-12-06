# **Git Commands**
<br>

## **Table Of Contents**
<br>

- [**Git Commands**](#git-commands)
  - [**Table Of Contents**](#table-of-contents)
  - [**Git Setup**](#git-setup)
    - [**Configuration (_git config_)**](#configuration-git-config)
    - [**Create New Git Repository (_git init_)**](#create-new-git-repository-git-init)
    - [**Copy Existing Git Repository (_git clone_)**](#copy-existing-git-repository-git-clone)
    - [**Get Information About Git Command (_git help \<command\>_)**](#get-information-about-git-command-git-help-command)
  - [**Git Workflow**](#git-workflow)
    - [**Get Information**](#get-information)
      - [**Current Status (_git status_)**](#current-status-git-status)
      - [**Commit History (_git log_)**](#commit-history-git-log)
      - [**Show File Changes (_git diff_)**](#show-file-changes-git-diff)
    - [**Branches**](#branches)
      - [**List Branches (_git branch_)**](#list-branches-git-branch)
      - [**Switch Branch (_git switch \<branchName\>_)**](#switch-branch-git-switch-branchname)
      - [**Create New Branch (_git switch -c \<newBranchName\>_)**](#create-new-branch-git-switch--c-newbranchname)
      - [**Delete Branch (_git branch -d \<branchName\>_)**](#delete-branch-git-branch--d-branchname)
    - [**Stash Changes**](#stash-changes)
      - [**List All Stashes (_git stash list_)**](#list-all-stashes-git-stash-list)
      - [**Inspect Specific Stash (_git stash show \<?stashId\>_)**](#inspect-specific-stash-git-stash-show-stashid)
      - [**Save Changes To Stash (_git stash_ / _git stash push_)**](#save-changes-to-stash-git-stash--git-stash-push)
      - [**Load Changes From Stash (_git stash pop \<?stashId\>_)**](#load-changes-from-stash-git-stash-pop-stashid)
      - [**Delete Specific Stash (_git stash drop \<?stashId\>_)**](#delete-specific-stash-git-stash-drop-stashid)
      - [**Delete All Stashes (_git stash clear_)**](#delete-all-stashes-git-stash-clear)
    - [**Staging Area**](#staging-area)
      - [**Add Changes (_git add \<fileOrDirectory\>_)**](#add-changes-git-add-fileordirectory)
      - [**Remove Changes (_git restore \<file\>_)**](#remove-changes-git-restore-file)
    - [**Commits**](#commits)
      - [**Commit Changes (_git commit_)**](#commit-changes-git-commit)
      - [**Move Back To Past Commit (_git checkout \<commitHash\>_)**](#move-back-to-past-commit-git-checkout-commithash)
    - [**Remote Repositories**](#remote-repositories)
      - [**Configurate Connections**](#configurate-connections)
        - [**Show Connections (_git remote -v_)**](#show-connections-git-remote--v)
        - [**Add Connection (_git remote add \<name\> \<url\>_)**](#add-connection-git-remote-add-name-url)
        - [**Rename Connection (_git remote rename \<oldName\> \<newName\>_)**](#rename-connection-git-remote-rename-oldname-newname)
        - [**Remove Connection (_git remote rm \<name\>_)**](#remove-connection-git-remote-rm-name)
      - [**Push To Remote Repository (_git push \<?connectionName\> \<?localBranch\>:\<?remoteBranch\>_)**](#push-to-remote-repository-git-push-connectionname-localbranchremotebranch)
      - [**Pull From Remote Repository (_git pull \<?remote\> \<?branchName\>_)**](#pull-from-remote-repository-git-pull-remote-branchname)

<br>
<br>
<br>

## **Git Setup**
<br>
<br>

### **Configuration (_git config_)**
<br>

```bash
git config --list
```
- print current configuration to console

<br>

```bash
git config --global user.name 'John Doe'
git config --global user.email 'john.doe@example.com'
```
- set user name and mail

<br>

```bash
git config --global core.editor 'vim'
```
- set git´s default editor to vim

<br>
<br>

### **Create New Git Repository (_git init_)**
<br>

```bash
git init
```
- create git repository at current working directory

<br>

```bash
git init <directory>
```
- create git repository at specified directory

<br>

```bash
git init -b <branchName>
```
- create git repository with specified branchName (Default: `master`)

<br>
<br>

### **Copy Existing Git Repository (_git clone_)**
<br>

1. Clone a repository (local or remote) into a newly created directory
2. Create forked initial branch from cloned repository´s active branch

<br>

```bash
git clone ./localRepository
```
- clone local repository

<br>

```bash
git clone https://github.com/someUser/someRepository.git
```
- clone remote repository

<br>
<br>

### **Get Information About Git Command (_git help \<command\>_)**
<br>

```bash
git help add
```

<br>
<br>
<br>

## **Git Workflow**
<br>
<br>
<br>

### **Get Information**
<br>
<br>

#### **Current Status (_git status_)**
<br>

Prints information about the current status to console:
- current branch
- changes in staging area
- changes in working area
- untracked files

<br>

```bash
git status
```

prints
```
On branch master
Changes to be committed:
  (use "git restore --staged <file>..." to unstage)
	modified:   file1.md

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git restore <file>..." to discard changes in working directory)
	modified:   file2.md

Untracked files:
  (use "git add <file>..." to include in what will be committed)
	file3.md
```

<br>
<br>

#### **Commit History (_git log_)**
<br>

```bash
git log
```

prints

```
commit 0924bdc338bafa247eb94c7205973420a44871c4 (HEAD -> master)
Author: John Doe <john.doe@example.com>
Date:   Sun Dec 3 12:41:44 2023 +0100

    add comment for function foo()

commit 0bdb6a04886c72ca59c297502522e8b355eba7f8
Author: Author: John Doe <john.doe@example.com>
Date:   Sun Dec 3 12:40:03 2023 +0100

    initial commit
```

<br>
<br>

```bash
git log --all --graph --decorate
```

prints

```
*   commit 4a347631a73f9c8f36453a4cc38f2f297468f4b4 (HEAD -> master)
|\  Merge: 0924bdc ae78318
| | Author: John Doe <john.doe@example.com>
| | Date:   Sun Dec 3 20:15:16 2023 +0100
| | 
| |     WIP on master: 0924bdc delete file
| | 
| * commit ae78318bd0a3e9ffef84cd3272be61802993ac41
|/  Author: John Doe <john.doe@example.com>
|   Date:   Sun Dec 3 20:15:16 2023 +0100
|   
|       index on master: 0924bdc delete file
| 
* commit 0924bdc338bafa247eb94c7205973420a44871c4
| Author: John Doe <john.doe@example.com>
| Date:   Sun Dec 3 12:41:44 2023 +0100
| 
|     delete file
| 
* commit 0bdb6a04886c72ca59c297502522e8b355eba7f8
  Author: John Doe <john.doe@example.com>
  Date:   Sun Dec 3 12:40:03 2023 +0100
```

<br>
<br>

#### **Show File Changes (_git diff_)**
<br>

```bash
git diff
```
- see changes of each file in the **working area** compared to current version in last commit

<br>

```bash
git diff --staged
```
- see changes of each file in the **staging area** compared to current version in last commit

<br>
<br>
<br>

### **Branches**
<br>
<br>

#### **List Branches (_git branch_)**
<br>

```bash
git branch
```
- list existing local branches
- highlight active branch in green and with asterisk

<br>

```bash
git branch --all
```
- list existing local **and** remote-tracking branches 
- highlight active branch in green and with asterisk

<br>
<br>

#### **Switch Branch (_git switch \<branchName\>_)**
<br>

```bash
git switch feature/sorting
```

<br>
<br>

#### **Create New Branch (_git switch -c \<newBranchName\>_)**
<br>

```bash
git switch -c feature/sorting
```

<br>
<br>

#### **Delete Branch (_git branch -d \<branchName\>_)**
<br>

```bash
git branch -d feature/sorting
```

<br>
<br>
<br>

### **Stash Changes**
<br>

We can save uncommitted changes in the stash to continue working on them later.

<br>
<br>

#### **List All Stashes (_git stash list_)**
<br>

```bash
git stash list
```

prints

```
stash@{0}: WIP on master: 0924bdc fix typo
``` 

<br>
<br>

#### **Inspect Specific Stash (_git stash show <?stashId>_)**
<br>

```bash
git stash show
```
- inspect latest stash

<br>

```bash
git stash show stash@{5}
```
- inspect stash with id `stash@{5}`

<br>
<br>

#### **Save Changes To Stash (_git stash_ / _git stash push_)**
<br>

```bash
git stash
```

<br>
<br>

#### **Load Changes From Stash (_git stash pop <?stashId>_)**
<br>

```bash
git stash pop
```
- **load** and **remove** latest stash

<br>

```bash
git stash pop stash@{2}
```
- **load** and **remove** stash with id `stash@{2}`

<br>
<br>

#### **Delete Specific Stash (_git stash drop \<?stashId\>_)**
<br>

```bash
git stash drop stash@{2}
```

<br>
<br>

#### **Delete All Stashes (_git stash clear_)**
<br>

```bash
git stash clear
```

<br>
<br>
<br>

### **Staging Area**
<br>
<br>

#### **Add Changes (_git add \<fileOrDirectory\>_)**
<br>

```bash
git add ./path/file
```
- add changes of specified file to staging area

<br>

```bash
git add ./path/directory
```
- add all changes of all files within specified directory

<br>

```bash
git add -A
```
- add all changes within the entire repository

<br>
<br>

#### **Remove Changes (_git restore \<file\>_)**
<br>

```bash
git restore --staged ./path/file
```
- remove changes of specified file from staging area

<br>
<br>
<br>

### **Commits**
<br>
<br>

#### **Commit Changes (_git commit_)**
<br>

```bash
git commit
```
- open configured text editor to enter commit message and commit changes

<br>

```bash
git commit -m 'message'
```
- commit changes with defined message

<br>
<br>

#### **Move Back To Past Commit (_git checkout \<commitHash\>_)**
<br>

```bash
git checkout 09117c167cdcddd5acf90420382a3c3f820d35bb
```

<br>
<br>
<br>

### **Remote Repositories**
<br>
<br>

#### **Configurate Connections**
<br>
<br>

##### **Show Connections (_git remote -v_)**
<br>

```bash
git remote -v
```

<br>
<br>

##### **Add Connection (_git remote add \<name\> \<url\>_)**
<br>

```bash
git remote add origin https://github.com/someUser/someRepository.git
```
- add connection with name `origin` to remote repository `https://github.com/someUser/someRepository.git`

<br>
<br>

##### **Rename Connection (_git remote rename \<oldName\> \<newName\>_)**
<br>

```bash
git remote rename origin upstream
```
- rename connection to remote repository from `origin` to `upstream`

<br>
<br>

##### **Remove Connection (_git remote rm \<name\>_)**
<br>

```bash
git remote rm origin
```
- rename remote repository connection `origin`

<br>
<br>

#### **Push To Remote Repository (_git push \<?connectionName\> \<?localBranch\>:\<?remoteBranch\>_)**
<br>

```bash
git push
```
- push current local branch to remote repository

<br>

```bash
git push origin master
```
- push changes of local branch `master` of remote repository `origin`

<br>

```bash
git push origin feature123:master
```
- push changes of local branch `feature123` to `master` branch of remote repository `origin`

<br>
<br>

#### **Pull From Remote Repository (_git pull \<?remote\> \<?branchName\>_)**
<br>

```bash
git pull
```
- **fetch** and **merge** changes from remote repository (default `remote` and `merge` for current branch)

<br>

```bash
git pull origin
```
- **fetch** and **merge** changes from remote repository `origin`

<!-- 

  === Ignoring Files ===
  - .gitignore file
    - #: comment
    - glob pattern [abc]: match any character inside brackets
    - negate pattern: !
    - *: matches any number of characters including zero
    - ?: matches single character


  === git diff ===
  - git diff:             see only unstaged changes
  - git diff --staged:    see only staged changes


  === Remove File ===
  - git rm path/to/file             removes file from staging area

  
## **Branches**

```bash
git merge <branch_name>         # merge <branch_name> to the current branch
```

-->