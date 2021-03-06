# wall-of-rain

https://programmingpraxis.com/2013/11/15/twitter-puddle/

### Summary
Let's say there is a wall. The inside of the wall is at different heights, and the top and sides are open. It has some arbitrary length. When it rains, water collect in the wall. How much water will collect in the wall?

An example wall could have heights: 2,3,5,1,1,4,6,3 . If we visualize this wall, we can see a dip in the center in bewteen the 5 height and the 6 height that will collect water. The wall will collect 9 units of water.


## Simple (to figure out) solution: 2D array of every possible space
One way to solve this is to generate a 2d array and check each open space if it is between two heights. This will be the purpose of array_approach.php .

#### Array method performance and limits
The memory use of this method appears to be exponetial based on the length of the wall and maximum height. When cranking the inputs to 10,000 PHP ran out of memory.
Currently, this method can only handle positive heights.

## Next solution: Water above pillar
A different solution would be to take the array and at each point, check to see if there is a higher number on either side. Ex. we have a wall with values 2, 1, 2. The first pillar is asked "Do you have anyone higher on your left?" and then "Do you have anyone higher on your right?". If both are true, which ever height difference is lower is the amount of water that can be above said pillar. So the flow would go 1st pillar checks left (no more wall) then right (lower and same height, nothing higher). This means no water can be above pillar 1. Pillar 2 checks left (highest pillar is the first with a diff of 1) and the right (same result as left). This means that 1 unit of water can be over pillar two. Pillar 3 ends up being a mirror of pillar 1, so in total 1 unit of water can puddle in this wall.

#### Pillar method performance and limits
This thing runs faster than the array method, and uses up very little memory. It is quadratic instead of exponential, which isn't perfect. The pillar method can handle lengths up to 10k without crashing. It can even handle negetive heights!

## Refining the Pillar Method
Right now, the big O notation is n^2. I think we can put in some rules to cut down on iterating over the same columns over and over. Let's say the wall is 4,2,3,5,1. We figure out pillar 1 has no water over it (the ends are always free from water above), then move on to pillar 2. Pillar 2 will have 2 water above. Now for pillar 3, if the height is shorter than pillar 2 + water, than pillar 3 must have water above. So instead of running the full leftHeight rightHeight, we can check the height of pillar 3 first with a constant time if statement.
