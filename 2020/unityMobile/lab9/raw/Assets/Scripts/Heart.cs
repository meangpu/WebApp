using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Heart : MonoBehaviour
{

    public int life = 1;
    public float fallGravity = 50f;
    GameManager gameManager;
    
    void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
    }
    
    void Update()
    {
        if(gameManager.life == life)
        {
            gameObject.GetComponent<Rigidbody2D>().gravityScale = fallGravity;
        }
    }
}
