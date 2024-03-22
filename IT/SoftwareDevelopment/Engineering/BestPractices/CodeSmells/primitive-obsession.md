# **Primitive Obsession**
<br>

## **Table Of Contents**

- [**Primitive Obsession**](#primitive-obsession)
  - [**Table Of Contents**](#table-of-contents)
  - [**Problem**](#problem)
  - [**Effects**](#effects)
  - [**Solution**](#solution)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Problem**

The code frequently relies on the primitive data types of the language for a lot of purposes.

<br>
<br>
<br>
<br>

## **Effects**

Code with the *primitive obsession* code has a high probability to 
- introduce code duplication
- be inflexible
- be hard to understand
- be unorganized 

<br>
<br>
<br>
<br>

## **Solution**

- logically group primitives and associated behavior into separate classes
- introduce parameter objects

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

**Before**

```typescript
class Person {
   private id: number;
   private firstName: string;
   private lastName: string;
   private phone: string;
   private mobile: string;
   private mail: string;

   constructor(id: number, firstName: string, lastName: string, phone: string, mobile: string, mail: string) {
      this.id = id;
      this.firstName = firstName;
      this.lastName = lastName;
      this.phone = phone;
      this.mobile = mobile;
      this.mail = mail;
   }

   // implementation
}

const johnDoe = new Person(
   1234,
   'John',
   'Doe',
   '0236344556',
   '0873355455',
   'john.doe@example.com'
);
```

<br>
<br>

**After**

```typescript
class Person {
   private id: PersonId;
   private name: Name;
   private phone: PhoneNumber;
   private mobile: PhoneNumber;
   private mail: MailAddress;

   constructor(args: PersonArgs) {
      this.id = args.id;
      this.name = args.name;
      this.phone = args.phone;
      this.mobile = args.mobile;
      this.mail = args.mail;
   }

   // implementation
}

const personArgs = {
   id: new PersonId('1234'),
   name: new Name('John', 'Doe'),
   phone: PhoneNumber.parse('0236344556'),
   mobile: PhoneNumber.parse('0873355455'),
   mail: Email.parse('john.doe@example.com')
};

const johnDoe = new Person(personArgs);
```