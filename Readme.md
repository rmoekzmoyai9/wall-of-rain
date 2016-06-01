# wall-of-rain

https://programmingpraxis.com/2013/11/15/twitter-puddle/

### Summary
Let's say there is a wall. The inside of the wall is at different heights, and the top and sides are open. It has some arbitrary length. When it rains, water collect in the wall. How much water will collect in the wall?

An example wall could have heights: 2,3,5,1,1,4,6,3 . If we visualize this wall, we can see a dip in the center in bewteen the 5 height and the 6 height that will collect water. The wall will collect 9 units of water.


## My solutions
One way to solve this is to generate a 2d array and check each open space if it is between two heights. This will be the purpose of array_approach.php .

#### Array method performance and limits
The memory use of this method appears to be exponetial based on the length of the wall and maximum height. When cranking the inputs to 10,000 PHP ran out of memory.
Currently, this method can only handle positive heights.
