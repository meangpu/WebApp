﻿using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class togglePlayerPhy : MonoBehaviour
{
     public PhysicsMaterial2D Material1;
     //in the editor this is what you would set as the object you wan't to change

     public void changeMat()
     {
        Material1.bounciness = 0;
     }
 
}
