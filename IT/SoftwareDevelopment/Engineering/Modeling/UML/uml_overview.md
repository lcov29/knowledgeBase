# **UML Overview**
<br>

```mermaid
flowchart LR
   classDef group fill:lightgray,color: black,stroke: black;

   A[UML Diagrams]:::group
   B[Structure Diagrams]:::group
   C[Behavior Diagrams]:::group
   D(Element Diagram)
   E(Class Diagram)
   F(Package Diagram)
   G(Component Diagram)
   H(Deployment Diagram)
   I(State Diagram)
   J(Use Case Diagram)
   K(Activity Diagram)
   L(Interaction Diagram):::group
   M(Sequence Diagram)
   N(Communication Diagram)

   A --> B & C
   B --> D & E & F & G & H
   C --> I & J & K & L
   L --> M & N

   click D "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/structureDiagrams/uml_element_diagram.md" _blank
   click E "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/structureDiagrams/uml_class_diagram.md" _blank
   click F "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/structureDiagrams/uml_package_diagram.md" _blank
   click G "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/structureDiagrams/uml_component_diagram.md" _blank
   click H "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/structureDiagrams/uml_deployment_diagram.md" _blank
   click I "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/behaviorDiagrams/uml_state_diagram.md" _blank
   click J "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/behaviorDiagrams/uml_use_case_diagram.md" _blank
   click K "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/behaviorDiagrams/uml_activity_diagram.md" _blank
   click M "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/behaviorDiagrams/interactionDiagrams/uml_sequence_diagram.md" _blank
   click N "https://github.com/lcov29/knowledgeBase/tree/master/IT/SoftwareDevelopment/Engineering/Modeling/UML/behaviorDiagrams/interactionDiagrams/uml_communication_diagram.md" _blank

```