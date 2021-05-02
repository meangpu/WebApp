using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player : MonoBehaviour
{

    Rigidbody2D rb2D;
    Animator m_Animator;
    [SerializeField] float jumpForce = 5f;
    GameManager gameManager;

    private TouchControl touchControls;
    void Awake()
    {
        touchControls = new TouchControl();
    }

    void OnEnable()
    {
        touchControls.Enable();
    }
    void OnDisable()
    {
        touchControls.Disable();
    }


    void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        rb2D = GetComponent<Rigidbody2D>();
        m_Animator = GetComponent<Animator>();
    }

    void Update()
    {

        if(touchControls.player.Jump.triggered)
        {
            if (!gameManager.playing && gameManager.beforeStart.activeSelf && !gameManager.BackSelChar.activeSelf)
            {
                gameManager.startGame();
                Jump();
            }
            else
            {
                if (!gameManager.in_ar_mode.activeSelf && !gameManager.BackSelChar.activeSelf)
                {
                    Jump();
                }
                
            }

        }
        

    }

    void Jump()
    {
        rb2D.velocity = Vector2.up * jumpForce;
        m_Animator.SetTrigger("Jump");
    }

    void OnCollisionEnter2D(Collision2D col)
    {
        Debug.Log(col);
        gameManager.GameOver();
    }

    

}
