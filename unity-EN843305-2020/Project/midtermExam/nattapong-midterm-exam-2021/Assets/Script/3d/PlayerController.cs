using System.Collections.Generic;
using UnityEngine;

namespace SkeletonEditor
{

    public class PlayerController : MonoBehaviour
    {
        public float mouseRotateSpeed = 0.3f;

        private Animator animator;
        private Quaternion initRotation;


        private int currentAnimation;
        public List<string> animations;


        private bool startMouseRotate;
        private Vector3 prevMousePosition;

        public static PlayerController Instance { get; private set; }
        Vector3 moveDirection;
        public Rigidbody r;
        public float moveSpeed = 10f;
        bool addSpeed = false;

        public bool isLeft = false;
        public bool isRight = false;
        public bool isForword = false;
        public bool isBack = false;

        public GameManager gameManager;


        void Awake()
        {
            if (Instance != null)
            {
                Destroy(this.gameObject);
            }
            Instance = this;
        }

        void Start()
        {
            gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();


            animator = GetComponent<Animator>();
            initRotation = transform.rotation;
            r = GetComponent<Rigidbody>();

            animations = new List<string>()
            {
                "Attack",
                "Active",
                "Passive"
            };
        }

        void Update()
        {

            if (Input.GetKeyDown(KeyCode.T) && animator.GetCurrentAnimatorClipInfo(0)[0].clip.name != "Attack")
            {
                animator.SetTrigger("Attack");

            }
            if (animator.GetCurrentAnimatorClipInfo(0)[0].clip.name == "Attack"
            && animator.GetCurrentAnimatorStateInfo(0).normalizedTime > 0.3 && GetComponent<AudioSource>().isPlaying == false)
            {
                // Task : Play Effect Sound
                GetComponent<AudioSource>().Play();
            }

            if (Input.GetKeyDown(KeyCode.LeftShift))
            {
                addSpeed = true;
            }

            if (Input.GetKeyUp(KeyCode.LeftShift))
            {
                moveSpeed = 10;
                addSpeed = false;
            }

            if (addSpeed == true)
            {
                moveSpeed = moveSpeed + 1;

            }

            if (Input.GetMouseButtonDown(1))
            {
                startMouseRotate = true;
                prevMousePosition = Input.mousePosition;
            }
            if (Input.GetMouseButtonUp(1))
            {
                startMouseRotate = false;
            }
            if (Input.GetMouseButton(1))
            {
                transform.Rotate(new Vector3(0, (Input.mousePosition.x - prevMousePosition.x) * mouseRotateSpeed, 0));
                prevMousePosition = Input.mousePosition;
            }

            if (Input.GetKeyDown(KeyCode.Space))
            {
                r.AddForce(new Vector3(0, 100, 0));
                animator.SetTrigger("Passive");

            }


            float h = Input.GetAxis("Horizontal");
            float v = Input.GetAxis("Vertical");
            if (isLeft)
            {

                h = -1f;
            }

            if (isRight)
            {

                h = 1f;
            }

            if (isForword)
            {
                v = -1f;
            }

            if (isBack)
            {
                v = 1f;
            }


            if (Mathf.Abs(h) > 0.001f)
                v = 0;

            if (!startMouseRotate)
            {
                if (h > 0.5f)
                {
                    transform.rotation = Quaternion.Euler(initRotation.eulerAngles + new Vector3(0, 90, 0));
                }
                if (h < -0.5f)
                {
                    transform.rotation = Quaternion.Euler(initRotation.eulerAngles + new Vector3(0, -90, 0));
                }
                if (v > 0.5f)
                {
                    transform.rotation = Quaternion.Euler(initRotation.eulerAngles + new Vector3(0, 0, 0));
                }
                if (v < -0.5f)
                {
                    transform.rotation = Quaternion.Euler(initRotation.eulerAngles + new Vector3(0, 180, 0));
                }
            }

            var speed = Mathf.Max(Mathf.Abs(h), Mathf.Abs(v));
            animator.SetFloat("speedv", speed);

            moveDirection = new Vector3(h, r.velocity.y, v);

            transform.position += moveDirection * Time.deltaTime * moveSpeed;

        }

        public string AnimationName()
        {
            return animator.GetCurrentAnimatorClipInfo(0)[0].clip.name;
        }

        public void SetLeft(bool b)
        {
            isLeft = b;
        }

        public void SetRight(bool b)
        {
            isRight = b;
        }

        public void SetForword(bool b)
        {
            isForword = b;
        }

        public void SetBack(bool b)
        {
            isBack = b;
        }


        public void Attack()
    {
        if ( animator.GetCurrentAnimatorClipInfo(0)[0].clip.name != "Attack")
            {
                animator.SetTrigger("Attack");

            }
    }

    public void Jump()
    {
        // Task : jump 
        r.AddForce(new Vector3(0, 100, 0));
        animator.SetTrigger("Passive");
    }

    private void OnCollisionEnter(Collision collision)
    {
        if(collision.gameObject.tag == "Fruit")
        {
            gameManager.AddScore(10);
            Destroy(collision.gameObject);
        }

    }
    }


    


}