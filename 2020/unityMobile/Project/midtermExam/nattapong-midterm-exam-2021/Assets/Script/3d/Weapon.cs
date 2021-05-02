using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Weapon : MonoBehaviour
{

    public GameManager gameManager;
    public SkeletonEditor.PlayerController player;
    private Monster enemyScript;
    // Start is called before the first frame update
    void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

       private void OnTriggerEnter(Collider other) {
            if(other.gameObject.tag=="Monster"){
                if(player.AnimationName() == "Attack"){
                    enemyScript = other.gameObject.GetComponent<Monster>();
                    gameManager.AddScore(enemyScript.score);
                    Destroy(other.gameObject);

                    // Task : add score and destroy monster
                    
                }
            
        }
    }
}
