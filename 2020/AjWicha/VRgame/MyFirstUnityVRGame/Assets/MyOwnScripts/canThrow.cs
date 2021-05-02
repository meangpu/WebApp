using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class canThrow : MonoBehaviour
{
    public int selfScore;
    public scoreManager scoreScript;

    private void Start() {
        scoreScript = GameObject.Find("scoreManager").GetComponent<scoreManager>();
    }


    private void OnCollisionEnter(Collision other) {
        if (other.gameObject.tag == "blackGoal")
        {
            Destroy(gameObject);
            scoreScript.updateScore(selfScore);

        }   
    }

}
