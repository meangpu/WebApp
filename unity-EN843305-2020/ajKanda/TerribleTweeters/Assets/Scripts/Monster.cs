using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Monster : MonoBehaviour
{
    [SerializeField] Sprite _deadSprite;
    [SerializeField] ParticleSystem _particleSystem;
    bool _hasDie;

    void OnCollisionEnter2D(Collision2D collision)
    {
        if (shouldDieFromCollision(collision) && !_hasDie)
        {
            StartCoroutine(Die());
        }
    }

    bool shouldDieFromCollision(Collision2D collision)
    {
        if(_hasDie)
        {
            return true;
        }
        Bird bird = collision.gameObject.GetComponent<Bird>();
        if (bird != null)
        {
            return true;
        }
        if (collision.contacts[0].normal.y < -0.5f)
        {
            return true;
        }
        return false;
    }

    IEnumerator Die()
    {
        _hasDie = true;
        GetComponent<SpriteRenderer>().sprite = _deadSprite;
        _particleSystem.Play();

        yield return new WaitForSeconds(1);
        gameObject.SetActive(false);
        GameObject.Find("levelControl").GetComponent<GameManager>().checkFinishLevel();
    }


}
