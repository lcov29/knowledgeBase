# **Git Basics**
<br>
<br>

## **Table Of Contents**
<br>

- [**Git Basics**](#git-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Git Terminology**](#git-terminology)
  - [**Data Model**](#data-model)
    - [**Overview**](#overview)
    - [**Implementation**](#implementation)
  - [**Basic Git Workflow**](#basic-git-workflow)
  - [**Branches**](#branches)
  - [**Ignore Files**](#ignore-files)

<br>
<br>
<br>

## **General**
<br>

- Git is a version control system
  - keeps track of changes to files in snapshots
  - support collaboration of differrent people

<br>
<br>
<br>

## **Git Terminology**
<br>

|Git  |Description |
|:----|:-----------|
|tree |Folder      |
|blob |File        |

<br>
<br>
<br>

## **Data Model**
<br>
<br>

### **Overview**
<br>

Git uses a **directed acyclic graph** to model changes over time:

<br>

```mermaid
flowchart RL
  1(( ))
  2(( ))
  3(( ))
  4(( ))
  5(( ))
  6(( ))
  7(( ))
  8(( ))
  9(( ))
  10(( ))
  11((pastState))
  12((currentState))
  2 --> 1
  3 --> 2
  4 --> 3
  5 --> 4
  6 --> 5
  7 --> 6
  7 --> 8
  8 --> 9
  9 --> 3
  10 --> 7
  12 --> 11
```

<br>

- Each node in this graph represents a **snapshot of the tree at some point in time** plus **metadata** (who made what changes and when?)
- In Git terminology each node is called a **commit** and each edge is called a **reference**.
- Internally each commit has a unique identifier (hash value).

<br>
<br>

### **Implementation**
<br>

```javascript
type blob = byte[]

type tree = map<string, blob | tree>

type commit = {
  parents: commit[],
  metadata: string[]
  snapshot: tree
}

type object = blob | tree | commit

type objects = map<string, object>

function store(in)
  id: sha1(in)
  object[id] 

type references = map<string, string>   // maps alphanumerical name to hash id
```

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

<br>
<br>
<br>

## **Branches**
<br>

```mermaid
gitGraph
    commit id: "stateA"
    commit id: "stateB"
    commit id: "stateC"
    branch "branchA"
      checkout "branchA"
      commit id: "stateD"
      commit id: "stateE"
      checkout main
    merge "branchA" id: "stateF"
    commit id: "stateG"
```

<br>
<br>
<br>

## **Ignore Files**
<br>

Files that git should ignore can be specified in the `.gitignore` file