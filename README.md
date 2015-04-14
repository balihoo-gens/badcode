# badcode
Some awful python database code that needs improvement

## Goal
This project's purpose is to yield a programming test for prospective candidates. The test is this: 'given this godawful code, please create an improved version with the same functionality'. A skilled developer should not need more than an hour or two to clean up the mess. Less experienced candidates may need more time. The code does not come with documentation; part of the exercise is learning what it does. This does mean that the code should not be overly cryptic or deliberately misleading.

## Functionality
The code should cover basic database manipulation, inserting a bunch of data and then generating a report out of it. The goal is not to create overly complex functionality or solve very hard problems; it should be moderately easy to figure out what this code does: the challenge has to be to do the same in a clean, maintanable and reasonably efficient way, without being blocked by an incomprehensible piece of functionality.

## Code Generation
The bad code is (partially) generated, to make it easier for us to maintain it: We may want to make changes to the database or do things in a different horrible way once in a while. The developers of this project should not have to go into global search and replace mode to change such things.

## How bad?
The essence of the test is not to expose the candidate to deliberately unreadable or sneakily crafted code. The code should resemble something that may be produced by a very inexperienced programmer.

The badness of the generated code should address several aspects:
 * structure: There should be none, so that the candidate has to come up with good ways to break up and modularize the code
 * efficiency: The code should be inefficient, preferably in both obvious and non-obvious ways. Unnecessary nesting, lack of where clauses and joins, doing things multiple times that could be done once.
 * repetition: it should not be DRY, yielding way more code than necessary. 
 * dead / useless code: This happens a lot in real code and it is important to be able to identify a block of code that adds nothing to the system.
 * ???
 
## Testable
The bad code should have a predictable result, and thus pass a series of tests that both measure functionality as well as performance.
