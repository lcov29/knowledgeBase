# **Git Basics**
<br>
<br>

## **Table Of Contents**
<br>

- [**Git Basics**](#git-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basic Git Workflow**](#basic-git-workflow)

<br>
<br>
<br>

## **Basic Git Workflow**
<br>

All changes to a repository have one of the following states:

|State     |Location     |
|:---------|:------------|
|Untracked |Work Area    |
|Staged    |Staging Area |
|Committed |Repository   |

<br>
<br>

```mermaid
flowchart LR
  remoteRepo(Repository)
  localRepo(Repository)
  stage(Staging Area)
  work(Working Area)

  remoteRepo -- git fetch --> localRepo
  remoteRepo -- git pull --> work
  localRepo -- git push --> remoteRepo

  subgraph Local
    stage -- git commit --> localRepo
    stage -- "git restore --staged" --> work
    work -- git add --> stage
  end

  subgraph Remote 
    remoteRepo
  end
```



