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
  - [**Get Information**](#get-information)
    - [**Current Status (_git status_)**](#current-status-git-status)
    - [**Commit History (_git log_)**](#commit-history-git-log)
      - [**Visualize Commit Graph**](#visualize-commit-graph)
      - [**List All Commits In A Time Period**](#list-all-commits-in-a-time-period)
      - [**List All Commits That Added Or Modified Specific Content**](#list-all-commits-that-added-or-modified-specific-content)
    - [**Show File Changes (_git diff_)**](#show-file-changes-git-diff)
    - [**Show Commit History Of File (_git log \<fileName\>_)**](#show-commit-history-of-file-git-log-filename)
    - [**Show Author Of Changes (_git blame \<file\>_)**](#show-author-of-changes-git-blame-file)
    - [**Show Reference Change Log (_git reflog_)**](#show-reference-change-log-git-reflog)
    - [**Search Commit That Introduced A Bug (_git bisect_)**](#search-commit-that-introduced-a-bug-git-bisect)
  - [**Working Area**](#working-area)
    - [**Delete Untracked Files (_git clean_)**](#delete-untracked-files-git-clean)
  - [**Staging Area**](#staging-area)
    - [**Add Changes (_git add \<fileOrDirectory\>_)**](#add-changes-git-add-fileordirectory)
    - [**Remove Changes (_git restore \<file\>_)**](#remove-changes-git-restore-file)
    - [**Remove File (_git rm \<file\>_)**](#remove-file-git-rm-file)
  - [**Commits**](#commits)
    - [**Commit Changes (_git commit_)**](#commit-changes-git-commit)
    - [**Add Changes To Previous Commit (_git commit --amend_)**](#add-changes-to-previous-commit-git-commit---amend)
    - [**Revert Commit (_git revert \<commitHash\>_)**](#revert-commit-git-revert-commithash)
    - [**Move Temporarily Back To Past Commit (_git checkout \<commitHash\>_)**](#move-temporarily-back-to-past-commit-git-checkout-commithash)
    - [**Move Permanently Back To Past Commit (_git reset ?\<commitHash\>_)**](#move-permanently-back-to-past-commit-git-reset-commithash)
    - [**Show Changed Files In Commit (_git show --name-only ?\<commitHash\>_)**](#show-changed-files-in-commit-git-show---name-only-commithash)
  - [**Stash Changes**](#stash-changes)
    - [**List All Stashes (_git stash list_)**](#list-all-stashes-git-stash-list)
    - [**Inspect Specific Stash (_git stash show \<?stashId\>_)**](#inspect-specific-stash-git-stash-show-stashid)
    - [**Save Changes To Stash (_git stash_ / _git stash push_)**](#save-changes-to-stash-git-stash--git-stash-push)
    - [**Load Changes From Stash (_git stash pop \<?stashId\>_)**](#load-changes-from-stash-git-stash-pop-stashid)
    - [**Delete Specific Stash (_git stash drop \<?stashId\>_)**](#delete-specific-stash-git-stash-drop-stashid)
    - [**Delete All Stashes (_git stash clear_)**](#delete-all-stashes-git-stash-clear)
  - [**Tags**](#tags)
    - [**List Tags (_git tag_)**](#list-tags-git-tag)
    - [**Show Tag Information (_git show \<tagName\>_)**](#show-tag-information-git-show-tagname)
    - [**Add Tags**](#add-tags)
      - [**Add Lightweight Tag (\_git tag \<tagName\> ?\<commitId\>)**](#add-lightweight-tag-_git-tag-tagname-commitid)
      - [**Add Annotated Tag (_git tag -a \<tagName\> -m \<tagMessage\> ?\<commitId\>_)**](#add-annotated-tag-git-tag--a-tagname--m-tagmessage-commitid)
    - [**Delete Tag (_git tag -d \<tagName\>_)**](#delete-tag-git-tag--d-tagname)
  - [**Branches**](#branches)
    - [**List Branches (_git branch_)**](#list-branches-git-branch)
    - [**Switch Branch (_git switch \<branchName\>_)**](#switch-branch-git-switch-branchname)
    - [**Create New Branch (_git switch -c \<newBranchName\>_)**](#create-new-branch-git-switch--c-newbranchname)
    - [**Rename Local Branch (_git branch --move \<oldName\> \<newName\>_)**](#rename-local-branch-git-branch---move-oldname-newname)
    - [**Delete Branch (_git branch -d \<branchName\>_)**](#delete-branch-git-branch--d-branchname)
    - [**Integrate Changes From Other Branches**](#integrate-changes-from-other-branches)
      - [**Merging Branches (_git merge \<branchName\>_)**](#merging-branches-git-merge-branchname)
        - [**Abort Merge (_git merge --abort_)**](#abort-merge-git-merge---abort)
        - [**Quit Merge (_git merge --quit_)**](#quit-merge-git-merge---quit)
        - [**Continue Merge After Manually Resolving Conflicts (_git merge --continue_)**](#continue-merge-after-manually-resolving-conflicts-git-merge---continue)
      - [**Rebasing Branches (_git rebase \<branchName\>_)**](#rebasing-branches-git-rebase-branchname)
      - [**Integrate Specific Commits (_git cherry-pick \<commitId\>_)**](#integrate-specific-commits-git-cherry-pick-commitid)
  - [**Remote Repositories**](#remote-repositories)
    - [**Configurate Connections**](#configurate-connections)
      - [**Show Connections (_git remote -v_)**](#show-connections-git-remote--v)
      - [**Show Information About Connection (_git remote show \<branchName\>_)**](#show-information-about-connection-git-remote-show-branchname)
      - [**Add Connection (_git remote add \<name\> \<url\>_)**](#add-connection-git-remote-add-name-url)
      - [**Rename Connection (_git remote rename \<oldName\> \<newName\>_)**](#rename-connection-git-remote-rename-oldname-newname)
      - [**Remove Connection (_git remote rm \<name\>_)**](#remove-connection-git-remote-rm-name)
    - [**Changes**](#changes)
      - [**Push To Remote Repository (_git push \<?connectionName\> \<?localBranch\>:\<?remoteBranch\>_)**](#push-to-remote-repository-git-push-connectionname-localbranchremotebranch)
      - [**Pull From Remote Repository (_git pull \<?remote\> \<?branchName\>_)**](#pull-from-remote-repository-git-pull-remote-branchname)
    - [**Tags**](#tags-1)
      - [**Push Tags To Remote Repository (_git push \<connectionName\> \<tagName\>_)**](#push-tags-to-remote-repository-git-push-connectionname-tagname)
      - [**Delete Tags From Remote Repository (_git push \<connectionName\> --delete \<tagName\>_)**](#delete-tags-from-remote-repository-git-push-connectionname---delete-tagname)

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

## **Get Information**
<br>
<br>

### **Current Status (_git status_)**
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

### **Commit History (_git log_)**
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
git log -p
```
- shows commit history with diffs per commit

<br>
<br>

#### **Visualize Commit Graph**
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

#### **List All Commits In A Time Period**
<br>

```bash
git log --since=2.weeks
git log --since="2023-11-01" --before="2023-12-30"
```
- limit commit history by time

<br>
<br>

#### **List All Commits That Added Or Modified Specific Content**
<br>

```bash
git log -S "some content"
```
- list all commits that added or modified the content `some content`

<br>
<br>

### **Show File Changes (_git diff_)**
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

### **Show Commit History Of File (_git log \<fileName\>_)**
<br>

```bash
git log test.md
```
- show list of all commits that have modified the file

<br>
<br>

### **Show Author Of Changes (_git blame \<file\>_)**
<br>

```bash
git blame test.md
```
- show last editor of every line of file `test.md`

<br>

```bash
git blame -e test.md
```
- show email of last editor of every line of file `test.md`

<br>

```bash
git blame -w test.md
```
- show email of last editor of every line of file `test.md`
- ignore changes to whitespace

<br>

```bash
git blame -L 2 test.md
```
- show last editor of line 2 of file `test.md`

<br>


```bash
git blame -L 2,5 test.md
```
- show last editor of all lines between (and including) 2 and 5 of file `test.md`

<br>

```bash
git blame -M test.md
```
- show original author of lines that were **moved and copied** within the same file `test.md` 

<br>

```bash
git blame -C test.md
```
- show original author of lines that were **moved and copied** from other files to `test.md` 

<br>
<br>

### **Show Reference Change Log (_git reflog_)**
<br>

```bash
git reflog
```
- show log of when branch tips and other references were modified in the local repository

<br>
<br>

### **Search Commit That Introduced A Bug (_git bisect_)**
<br>

In order to use this command you need the following initial information:

1. "Bad" Commit: Id of commit that contains the bug
2. "Good" Commit: Id of commit before bug was introduced

The command will then pick the commit in the middle of this commit range and ask the user whether it contains the bug.  
It will iterate this process until it has found the commit that introduced the bug.

<br>

Example:

Assume that the current state of the project contains a bug that did not exist in a previous commit `85c327f91afd78a54f2bbc89c650be75e8ac1b2e`. To find the commit that introduced the bug run:

<br>

```bash
git bisect start
```

<br>

```bash
git bisect bad
```
- define latest commit where bug is present (default: current commit)

<br>

```bash
git bisect good 85c327f91afd78a54f2bbc89c650be75e8ac1b2e
```
- define first ancestor commit where bug is not present

<br>

The command will pick a commit in the middle of this range and move to this point in time:

```bash
Bisecting: 2 revisions left to test after this (roughly 2 steps)
[f995f27ca732de0ed64eb49c9d84f35f60ec1962] some commit message
```

<br>

The user can now check if the bug exists in this version and respone with either

```bash
git bisect bad
```

or

```bash
git bisect good
```

The command will use the feedback on the selected commit to make the range to choose the next commit from smaller. Iterate until all commits have been examined.

The command will now print the first commit that introduced the bug:

```bash
f995f27ca732de0ed64eb49c9d84f35f60ec1962 is the first bad commit
commit f995f27ca732de0ed64eb49c9d84f35f60ec1962
Author: John Doe <john.doe@example.com>
Date:   Tue Dec 12 21:29:59 2023 +0100

    add content

 file4.md | 1 +
 1 file changed, 1 insertion(+)
```

<br>

To clean up after the command run

```bash
git bisect reset
```

<br>
<br>
<br>

## **Working Area**
<br>
<br>

### **Delete Untracked Files (_git clean_)**
<br>

```bash
git clean -n
```
- performs a dry-run of the command
- prints which untracked files not mentioned in [`.gitignore`](./git_basics.md#ignore-files) would have been deleted

<br>

```bash
git clean --force
```
- deletes all untracked **files** not mentioned in [`.gitignore`](./git_basics.md#ignore-files)

<br>

```bash
git clean -d --force
```
- deletes all untracked **files and directories** not mentioned in [`.gitignore`](./git_basics.md#ignore-files)

<br>

```bash
git clean -i
```
- interactively deletes all untracked **files** not mentioned in [`.gitignore`](./git_basics.md#ignore-files)

<br>
<br>
<br>

## **Staging Area**
<br>
<br>

### **Add Changes (_git add \<fileOrDirectory\>_)**
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

### **Remove Changes (_git restore \<file\>_)**
<br>

```bash
git restore --staged ./path/file
```
- remove changes of specified file from staging area

<br>
<br>

### **Remove File (_git rm \<file\>_)**
<br>

```bash
git rm ./path/file
```
- deletes and untracks file

<br>

```bash
git rm --cached ./path/file
```
- untracks file but does not remove it from hard drive

<br>
<br>
<br>

## **Commits**
<br>
<br>

### **Commit Changes (_git commit_)**
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

### **Add Changes To Previous Commit (_git commit --amend_)**
<br>

```bash
git commit --amend
```
- add all staged changes to previous commit

<br>

```bash
git commit --amend -m 'message'
```
- add all staged changes to previous commit and replace its commit message

<br>
<br>

### **Revert Commit (_git revert \<commitHash\>_)**
<br>

```bash
git revert d58446c04cf1124702e650225d0293ab1638e53c
```
- add a new commit that reverts the changes made by the specified commit
- does not remove or modify commit `d58446c04cf1124702e650225d0293ab1638e53c`

<br>
<br>

### **Move Temporarily Back To Past Commit (_git checkout \<commitHash\>_)**
<br>

```bash
git checkout 09117c167cdcddd5acf90420382a3c3f820d35bb
```
- moves `HEAD` and puts it in `detached Head` mode
  - all changes committed in this mode are discarded after switching branch
  - create a new branch to make permanent commits 

<br>
<br>

### **Move Permanently Back To Past Commit (_git reset ?\<commitHash\>_)**
<br>

`git reset` moves `HEAD` and current branch reference.

>**WARNING**  
>  
>NEVER RESET **PUBLIC** HISTORY, USE [GIT REVERT](#revert-commit-git-revert-commithash) INSTEAD!
>
>`git reset` can cause commits after the specified commit to become orphans. This means that they will be **deleted** by the git garbage collection after some time.

<br>

```bash
git reset --hard 0a2cfd2d693c7deedc8bb4a4db25b101f688e7b8
```
- move `HEAD` and current branch reference to specified commit
- **DISCARD ALL CHANGES IN THE STAGING AND WORKING AREA!**

<br>

```bash
git reset --mixed 0a2cfd2d693c7deedc8bb4a4db25b101f688e7b8
```
- default behaviour of `git reset`
- move `HEAD` and current branch reference to specified commit
- moves content of staging area back to working area

<br>

```bash
git reset --soft 0a2cfd2d693c7deedc8bb4a4db25b101f688e7b8
```
- move `HEAD` and current branch reference to specified commit
- does not move any content of staging or working area

<br>
<br>

### **Show Changed Files In Commit (_git show --name-only ?\<commitHash\>_)**
<br>

```bash
git show --name-only 0a2cfd2d693c7deedc8bb4a4db25b101f688e7b8
```

<br>
<br>
<br>

## **Stash Changes**
<br>

We can save uncommitted changes in the stash to continue working on them later.

<br>
<br>

### **List All Stashes (_git stash list_)**
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

### **Inspect Specific Stash (_git stash show <?stashId>_)**
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

### **Save Changes To Stash (_git stash_ / _git stash push_)**
<br>

```bash
git stash
```

<br>
<br>

### **Load Changes From Stash (_git stash pop <?stashId>_)**
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

### **Delete Specific Stash (_git stash drop \<?stashId\>_)**
<br>

```bash
git stash drop stash@{2}
```

<br>
<br>

### **Delete All Stashes (_git stash clear_)**
<br>

```bash
git stash clear
```

<br>
<br>
<br>

## **Tags**
<br>

Specific commits can be marked with a tag. There are two types of tags:

<br>

|Tag Type    |Description                |
|:-----------|:--------------------------|
|lightweight |pointer to specific commit |
|annotated   |stored as git objects      |

<br>
<br>

### **List Tags (_git tag_)**
<br>

```bash
git tag
```

<br>
<br>

### **Show Tag Information (_git show \<tagName\>_)**
<br>

```bash
git show v1.2
```

<br>
<br>

### **Add Tags**
<br>
<br>

#### **Add Lightweight Tag (_git tag \<tagName\> ?\<commitId\>)**
<br>

```bash
git tag v1.2
```
- adds lightweight tag to current commit

<br>
<br>

#### **Add Annotated Tag (_git tag -a \<tagName\> -m \<tagMessage\> ?\<commitId\>_)**
<br>

```bash
git tag -a v1.2 -m 'version 1.2'
```

<br>
<br>

### **Delete Tag (_git tag -d \<tagName\>_)**
<br>

```bash
git tag -d v1.2
```
- delete local tag `v1.2`

<br>
<br>
<br>

## **Branches**
<br>
<br>

### **List Branches (_git branch_)**
<br>

```bash
git branch
```
- list existing local branches
- highlight active branch in green and with asterisk

<br>

```bash
git branch -v
```
- list all existing local branches
- shows last commit of each branch
- highlight active branch in green and with asterisk

<br>

```bash
git branch --merged
```
- list all branches that have been merged into the current branch

<br>

```bash
git branch --merged master
```
- list all branches that have been merged into the specified branch `master`

<br>

```bash
git branch --no-merged
```
- list all branches that have **not** been merged into the current branch

<br>

```bash
git branch --no-merged master
```
- list all branches that have **not** been merged into the specified branch `master`

<br>

```bash
git branch --all
```
- list existing local **and** remote-tracking branches 
- highlight active branch in green and with asterisk

<br>
<br>

### **Switch Branch (_git switch \<branchName\>_)**
<br>

```bash
git switch feature/sorting
```

<br>
<br>

### **Create New Branch (_git switch -c \<newBranchName\>_)**
<br>

```bash
git switch -c feature/sorting
```

<br>
<br>

### **Rename Local Branch (_git branch --move \<oldName\> \<newName\>_)**
<br>

```bash
git branch --move featurePagnation featurePagination
```
- rename the branch `featurePagnation` to `featurePagination`

<br>
<br>

### **Delete Branch (_git branch -d \<branchName\>_)**
<br>

```bash
git branch -d feature/sorting
```

<br>
<br>

### **Integrate Changes From Other Branches**
<br>
<br>

#### **Merging Branches (_git merge \<branchName\>_)**
<br>

For a general overview about merging, see [Merging Branches](./git_basics.md#merge)

<br>

```bash
git merge feature1
```
- merge branch `feature1` into current branch

<br>

```bash
git merge feature1 -m 'some commit message'
```
- merge branch `feature1` into current branch
- when performing a [recursive merge](./git_basics.md#recursive-merge): use specified merge commit message

<br>

```bash
git merge feature1 --squash
```
- merge branch `feature1` into current branch
- squash all diverging changes of branch `feature1` into a single commit
- you need to commit the squashed single commit with `git commit`

<br>
<br>

##### **Abort Merge (_git merge --abort_)**
<br>

```bash
git merge --abort
```
- only executable when merge conflict occured
- aborts merge
- will try to reconstruct pre-merge state (Therefore do not merge with uncommitted changes)

<br>
<br>

##### **Quit Merge (_git merge --quit_)**
<br>

```bash
git merge --quit
```
- only executable when merge conflict occured
- forget about merge

<br>
<br>

##### **Continue Merge After Manually Resolving Conflicts (_git merge --continue_)**
<br>

```bash
git merge --continue
```
- only executable when merge conflict occured
- continues merge after conflicts have been resolved

<br>
<br>

#### **Rebasing Branches (_git rebase \<branchName\>_)**
<br>

For a general overview about rebasing, see [Rebasing Branches](./git_basics.md#rebase)

<br>

```bash
git rebase master
```
- automatically rebase the current branch to the branch `master`

<br>

```bash
git rebase --interactive master
```
- interactively rebase the current branch to the branch `master`
- opens editor that allows user to specify actions of rebase (recommended)

<br>
<br>

#### **Integrate Specific Commits (_git cherry-pick \<commitId\>_)**
<br>

```bash
git cherry-pick 81cb32348a77457c0d1a241880a229a1202c822e
```
- add commit with specified id as a new commit at the top of the current branch

<br>

```bash
git cherry-pick 81cb32348a77457c0d1a241880a229a1202c822e -e
```
- add commit with specified id as a new commit at the top of the current branch
- open editor to allow user to modify the commit message

<br>
<br>
<br>

## **Remote Repositories**
<br>
<br>

### **Configurate Connections**
<br>
<br>

#### **Show Connections (_git remote -v_)**
<br>

```bash
git remote -v
```

<br>
<br>

#### **Show Information About Connection (_git remote show \<branchName\>_)**
<br>

```bash
git remote show origin
```

prints

```
* remote origin
  Fetch URL: https://github.com/someUser/someRepository.git
  Push  URL: https://github.com/someUser/someRepository.git
  HEAD branch: master
  Remote branch:
    master tracked
  Local branch configured for 'git pull':
    master merges with remote master
  Local ref configured for 'git push':
    master pushes to master (up to date)
```

<br>
<br>

#### **Add Connection (_git remote add \<name\> \<url\>_)**
<br>

```bash
git remote add origin https://github.com/someUser/someRepository.git
```
- add connection with name `origin` to remote repository `https://github.com/someUser/someRepository.git`

<br>
<br>

#### **Rename Connection (_git remote rename \<oldName\> \<newName\>_)**
<br>

```bash
git remote rename origin upstream
```
- rename connection to remote repository from `origin` to `upstream`

<br>
<br>

#### **Remove Connection (_git remote rm \<name\>_)**
<br>

```bash
git remote rm origin
```
- rename remote repository connection `origin`

<br>
<br>

### **Changes**
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

<br>
<br>

### **Tags**
<br>
<br>

#### **Push Tags To Remote Repository (_git push \<connectionName\> \<tagName\>_)**
<br>

```bash
git push origin v1.2
```
- push tag `v1.2` to remote `origin`

<br>

```bash
git push origin --tags
```
- push all tags to remote `origin`

<br>
<br>

#### **Delete Tags From Remote Repository (_git push \<connectionName\> --delete \<tagName\>_)**
<br>

```bash
git push origin --delete v1.2
```